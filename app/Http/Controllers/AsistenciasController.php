<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use App\Asistencia;
use App\Persona;
use App\Jornada_persona;
use DB;
use App\Jornada;
use App\Configuracion;

class AsistenciasController extends Controller
{
    public function index($id_jornada, $dni)
    {
        $persona = Persona::where('dni', $dni)->first();
        if(!is_null($persona)){
            if(Jornada_persona::where('jornada_id', $id_jornada)->where('persona_id', $persona->id)->count() > 0) {
                return response()->json(['error'=>false, 'nombre'=>$persona->nombre, 'apellido'=>$persona->apellido, 'ciudad_procedencia'=>$persona->ciudad_procedencia]);
            } else {
                return response()->json(['error'=>true, 'tipo'=>'2']); //No está inscripta
            }
        } else {
           return response()->json(['error'=>true, 'tipo'=>'1']); //No existe en el sistema
        }
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Traemos los datos de la persona
        $persona = Persona::where('dni', $request->get('persona_dni'))->first();
        //id de la jornada
        $jornada_id = $request->get('jornada_id');
        //traemos la configuración de la jornada (limite de asistencias, tolerancia, etc)
        $configuracion = Configuracion::where('jornada_id', $jornada_id)->get();
        //fecha actual
        $fecha = Carbon\Carbon::now();
        $fecha_cargar = $fecha->toDateTimeString();
        //última asistencia de la persona. La usamos para calcular la tolerancia
        $traer_ultima_asistencia = Asistencia::where('jornada_id', $jornada_id)->where('persona_id', $persona->id)->orderBy('created_at', 'DESC')->limit(1)->get();
        if(count($traer_ultima_asistencia) > 0){
            $ultima_asistencia = $traer_ultima_asistencia[0]['created_at']->toDateTimeString();
        }else{
            $ultima_asistencia = '';
        }
        //calculamos la tolerancia (en minutos)
        if($ultima_asistencia != ''){
            $tolerancia = Carbon\Carbon::parse($ultima_asistencia)->diffInMinutes($fecha);
        }else{
            $tolerancia = 1440; //Seteamos una tolerancia (minutos de un día)
        }
        $cantidad_asistencias = Asistencia::where('jornada_id', $jornada_id)->where('persona_id', $persona->id)->count();
        //control de errores
        if($tolerancia <= $configuracion[0]['tolerancia']){
            return response()->json(['error'=>true, 'mensaje'=>'Tolerancia no permitida. Ingresó por última vez: '.$ultima_asistencia]);
        } elseif ($cantidad_asistencias > $configuracion[0]['cantidad_asistencias'] && $cantidad_asistencias != 0) {
            return response()->json(['error'=>true, 'mensaje'=>'Esta persona superó el número de asistencias.']);
        }
        //Cargamos la asistencia normalmente.
        $nueva_asistencia = new Asistencia;
        $nueva_asistencia->jornada_id = $jornada_id;
        $nueva_asistencia->persona_id = $persona->id;
        $nueva_asistencia->created_at = $fecha_cargar;
        $nueva_asistencia->updated_at = $fecha_cargar;
        $nueva_asistencia->save();
        return response()->json(['error'=>false, 'fecha'=>$fecha_cargar, 'persona_id'=>$persona->id, 'jornada_id'=>$jornada_id]);
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id_jornada)
    {
        $jornada = Jornada::find($id_jornada);
        return view('asistencias.index', compact('jornada'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Jornada_persona;
use App\Jornada;
use App\Configuracion;

class AsistenciasController extends Controller
{
    public function index($id_jornada, $dni)
    {
        $persona = Persona::where('dni', $dni)->first();
        if(!is_null($persona)){
            if(Jornada_persona::where('jornada_id', $id_jornada)->where('persona_id', $persona->id)->count() > 0) {
                $return = response()->json(['error'=>false, 'nombre'=>$persona->nombre, 'apellido'=>$persona->apellido]);
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
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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

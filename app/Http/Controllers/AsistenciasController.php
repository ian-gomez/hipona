<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Jornada_persona;
use App\Jornada;
use App\Configuracion;

class AsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_jornada, $dni)
    {
        $persona = Persona::where('dni', $dni)->first();
        if(!is_null($persona)){
            if(Jornada_persona::where('jornada_id', $id_jornada)->where('persona_id', $persona->id)->count() > 0){
                $return = response()->json(['error'=>false, 'nombre'=>$persona->nombre, 'apellido'=>$persona->apellido]);
            }else{
                return response()->json(['error'=>true, 'tipo'=>'2']); //No está inscripta
            }
        }else{
           return response()->json(['error'=>true, 'tipo'=>'1']); //No existe en el sistema
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

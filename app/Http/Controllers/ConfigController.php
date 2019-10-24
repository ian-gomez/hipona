<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;

class ConfigController extends Controller
{
    public function index($id_jornada)
    {
        $jornada = Configuracion::where('jornada_id', $id_jornada)->get();
        return json_encode($jornada);
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
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $config = Configuracion::where('jornada_id', $request->get('jornada_id'))->first();
        $config->cantidad_asistencias = $request->get('cantidad_asistencias');
        $config->tolerancia = $request->get('tolerancia');
        $config->save();
    }

    public function destroy($id)
    {
        //
    }
}

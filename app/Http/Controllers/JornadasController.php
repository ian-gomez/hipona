<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jornada;
use DB;
use Yajra\Datatables\Datatables;

class JornadasController extends Controller
{
    public function index(Request $request)
    {
        $jornadas = Jornada::all();
        if($request->ajax()){
            return Datatables::of($jornadas)->addColumn('accion', function($row){
                $boton = "<button data-id=".$row->id." class='btn btn-warning editar'>Editar</button>";
                $boton = $boton." "."<button data-id=".$row->id." class='btn btn-info config' data-toggle='modal' data-target='#myModal'>Configuración</button>";
                $boton = $boton." "."<a href='/asistencias/".$row->id."'><button class='btn btn-primary asistencias'>Asistencias</button></a>";
                $boton = $boton." "."<button data-id=".$row->id." class='btn btn-danger eliminar'>Eliminar</button>";
                return $boton;
            })->rawColumns(['accion'])->make(true);
        }
        return view('jornadas.index');
    }

    public function create()
    {
        return view('jornadas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required',
            'ubicacion'=>'required',
            'fecha_inicio'=>'required|date',
            'fecha_fin'=>'required|date'
        ]);

        $jornada = new Jornada();
        $jornada->titulo = $request->get('titulo');
        $jornada->ubicacion = $request->get('ubicacion');
        $jornada->fecha_inicio = $request->get('fecha_inicio');
        $jornada->fecha_fin = $request->get('fecha_fin');
        $jornada->save();

        DB::insert('INSERT INTO configuracion (jornada_id, cantidad_asistencias, tolerancia) VALUES (?, ?, ?)', [$jornada->id, 0, 0]);

        return redirect('/jornadas')->with('success', 'Jornada agregada correctamente!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $jornada = Jornada::find($id);
        return view('jornadas.edit', compact('jornada'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo'=>'required',
            'ubicacion'=>'required',
            'fecha_inicio'=>'required|date',
            'fecha_fin'=>'required|date'
        ]);

        $jornada = Jornada::find($id);
        $jornada->titulo = $request->get('titulo');
        $jornada->ubicacion = $request->get('ubicacion');
        $jornada->fecha_inicio = $request->get('fecha_inicio');
        $jornada->fecha_fin = $request->get('fecha_fin');
        $jornada->save();

        return redirect('/jornadas')->with('success', 'Jornada actualizada correctamente!');
    }

    public function destroy($id)
    {
        $jornada = Jornada::find($id)->delete();
        DB::delete('DELETE FROM configuracion WHERE jornada_id = ?', [$id]);
    }

    public function buscar_nombre($id_jornada){
        $jornada = Jornada::where('id', $id_jornada)->first();
        return response()->json(['titulo'=>$jornada->titulo]);
    }
}

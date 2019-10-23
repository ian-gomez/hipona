<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Categoria;

class ListadoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        $cat=Categoria::pluck('descripcion','id');
        $per=persona::all();

        return view ('home', compact('per','cat'));       
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
        $cat=categoria::pluck('descripcion','id');
        $Personas= Persona::find($id);
        
        return view('edit', compact('Personas', 'cat'));
    }

    public function update(Request $request, $id)
    {
        $Personas = Persona::find($id);
        $Personas->fill($request->all());
        $Personas->save();

        return redirect()->route('Listado.index'); 
    }

    public function destroy($id)
    {
       Persona::destroy($id);
       return redirect('home');
    }
}

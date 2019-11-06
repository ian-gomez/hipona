<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PersonaController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('neo-registro', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'nombre' => 'string|min:1|max:255|required',
            'apellido' => 'string|min:1|max:255|required',
            'dni' => 'string|min:1|max:10|unique:personas|required',
            'email' => 'email|unique:personas,email|required',
            'fecha_nacimiento' => 'date|before:18 years ago|required',
            'telefono' => 'string|min:1|max:255|required',
            'ciudad_procedencia' => 'string|min:1|max:255|required',
            'area_conocimiento' => 'string|min:1|max:255|required',
            'nivel_ejerce' => 'string|min:1|max:255|required',
            'categoria_id' => 'exists:categorias,id|required',
            'estudiante_actual' => 'boolean|required',
        ]);

        $persona = new Persona();
        $persona->nombre = $validatedRequest['nombre'];
        $persona->apellido = $validatedRequest['apellido'];
        $persona->dni = $validatedRequest['dni'];
        $persona->email = $validatedRequest['email'];
        $persona->fecha_nacimiento = $validatedRequest['fecha_nacimiento'];
        $persona->telefono = $validatedRequest['telefono'];
        $persona->ciudad_procedencia = $validatedRequest['ciudad_procedencia'];
        $persona->area_conocimiento = $validatedRequest['area_conocimiento'];
        $persona->nivel_ejerce = $validatedRequest['nivel_ejerce'];
        $persona->categoria_id = $validatedRequest['categoria_id'];
        $persona->estudiante_actual = $validatedRequest['estudiante_actual'];
        $persona->save();

        return redirect()->back()->with('message', 'Usted se ha registrado con éxito');
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

    public function pdfGenerate (Request $request)
    {
        #$personas = Persona::all();
        $personas = Persona::where('apellido',$request->filtrar)->get();
        $pdf = \PDF::loadView('pdfPersonas', compact('personas'));
        return $pdf->download('listadoPersonas.pdf');
    }
}

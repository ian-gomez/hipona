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
    public function selectcategoria()
    {
        $cat=categoria::pluck('descripcion','id');
        return view ('inicio', compact($cat));
    }

    public function agregar (Request $request)
    {

        //Valida Dni, Edad, Correo

        $personas=Persona::where('dni',$request->dni)->get();
        $edadusuario=Persona::validarEdad($request->edad);
        $edadlimite=env('EDAD_LIMITE');

        if($personas->count() == 0 ) 
        { 
            $personas=Persona::where('email',$request->email)->get();

            if($personas->count() == 0 ) 
            {   

                $personas= new Persona;
                $personas-> dni= $request->dni;
                $personas-> nombre= $request->nombre;
                $personas-> apellido= $request->apellido;
                $nivel = $request->optradio;
                if ($nivel == 'otro'){
                    $nivel = $request->otro;
                }
                $personas-> nivel_ejerce = $nivel;
                $personas-> email= $request->email;
                if ($edadusuario >= $edadlimite){
                    $personas-> edad= $request->edad;
                }
                else
                {
                    Session::flash('mensaje_edad', "El usuario debe ser mayor de ". $edadlimite . " años"); 
                    if(\Auth::guest())
                    {
                        return redirect ('registro'); 
                    }
                    else{
                        return redirect ('home');
                    }

                }
                $personas-> telefono= $request->telefono;
                $personas-> area_conocimiento = $request->areaCon;
                $personas-> ciudad_procedencia = $request->ciudadP;
                $personas-> estudiante_actual = $request->estudianteActual;
                $personas->categoria_id= $request->categorias;

                $personas->save();
                $email=$request->email;
                $nombre=$request->nombre;

                try { /*
                    \Mail::send('emails.confirmation_code', ['email' => $email, 'nombre' => $nombre], function ($m) use ($email,$nombre) {
                    $m->from('formulario@sedessapientiae.com', 'Sedes Sapientiae');
                    $m->to($email, $nombre)->subject('Asunto del mensaje');
                    });*/
                } 
                catch (Exception $e) 
                { 
                    abort(303); 

                }
                
                return redirect('home');
            }           
else
{
    Session::flash('mensaje_correo', "El correo ya se encuentra registrado"); 
    return redirect ('registro');
}       

}       

else
{
    Session::flash('mensaje_dni', "El usuario ya se encuentra registrado"); 
    return redirect ('registro');
}

}

public function pdfGenerate (Request $request){

    #$personas = Persona::all(); 
    $personas = Persona::where('apellido',$request->filtrar)->get();
    $pdf = \PDF::loadView('pdfPersonas', compact('personas'));
    return $pdf->download('listadoPersonas.pdf');
}


public function exportar (){
    return view ('exportarPdf');
}

}

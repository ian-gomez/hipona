<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    function index()
    {
        $aux = Pais::where('name',$pais)->get();;
        dd($aux);
    }

    function validar()
    {
        return view('pais');
    }

    public function ValidarForm (Request $mostrar){
        //echo $mostrar->localidad;
        //echo $mostrar->provincia;
        //echo $mostrar->codigo;
        //$aux=Pais::getPaisByName ($mostrar->pais);
        $v=Pais::getLocalidadByName ($mostrar->localidad, $mostrar->pais);
        dd($v);
    }
}


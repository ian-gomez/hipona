<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais';

    static function getPaisByName ($nombre)
    {
        $valor=Pais::where('name',$nombre)->get();
        return $valor;
    }

    static function getLocalidadByName ($localidad, $pais)
    {
        $valord=Pais::where('localidades',$localidad)->where('name',$pais)->get();
        return $valord;
    }
}
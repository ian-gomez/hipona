<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = 'jornadas';
    protected $fillable = ['titulo', 'ubicacion', 'fecha_inicio', 'fecha_fin'];

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
	public $primaryKey = "jornada_id";
	public $timestamps = false;
	protected $table = "configuracion";
    protected $fillable = ['jornada_id', 'cantidad_asistencias', 'tolerancia'];
}

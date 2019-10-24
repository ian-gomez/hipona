<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
	protected $table = "configuracion";
	protected $fillable = ['jornada_id', 'cantidad_asistencias', 'tolerancia'];

	public $timestamps = false;
	public $primaryKey = "jornada_id";
}
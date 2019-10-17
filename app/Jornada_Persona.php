<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada_Persona extends Model
{
	protected $table = "jornada_persona";
    protected $fillable = ['jornada_id', 'persona_id'];

    public $timestamps = false;
}

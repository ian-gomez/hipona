<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada_persona extends Model
{
	public $timestamps = false;
	protected $table = "jornada_persona";
    protected $fillable = ['jornada_id', 'persona_id'];
}

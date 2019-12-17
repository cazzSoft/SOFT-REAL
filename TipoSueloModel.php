<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSueloModel extends Model
{
	protected $table = 'tipo_suelo';
    protected $primaryKey = 'id';
    public $timestamps=false;
}

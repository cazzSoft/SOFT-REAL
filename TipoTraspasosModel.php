<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTraspasosModel extends Model
{
    protected $table = 'tipo_traspasos';
    protected $primaryKey = 'id';
    public $timestamps=false;
}

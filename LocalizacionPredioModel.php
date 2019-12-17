<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalizacionPredioModel extends Model
{
    protected $table = 'localizacion_predio';
    protected $primaryKey = 'id';
    public $timestamps=false;
}

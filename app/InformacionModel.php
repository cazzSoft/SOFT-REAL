<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacionModel extends Model
{
    protected $table = 'informacion';
    protected $primaryKey = 'id';
    public $timestamps=false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupone extends Model
{
    protected $fillable = ['id_user','codigo','descripcion','id_categoria'];
}

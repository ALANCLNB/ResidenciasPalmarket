<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carritoproducto extends Model
{
    protected $fillable = ['id_user','id_producto','cantidad','unidad','imagen'];
}

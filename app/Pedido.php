<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable =['id_user','id_sucursal','cantidad_articulos','total','codigo','status'];
}

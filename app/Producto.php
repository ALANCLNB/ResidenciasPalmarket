<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','categoria','marca','precio','imagen','precio_ant','stock','id_user','oferta'];
}

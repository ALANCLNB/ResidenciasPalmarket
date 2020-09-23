<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','categoria','marca','precio','imagen','precio_ant','stock','embalaje','id_user','oferta'];
}

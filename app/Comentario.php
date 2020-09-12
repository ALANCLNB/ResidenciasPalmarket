<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable =['id_user','email','contenido','tipo','sucursal'];
}

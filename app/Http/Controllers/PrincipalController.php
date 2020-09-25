<?php

namespace App\Http\Controllers;

//use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    public function index(){

        $categoria = DB::table('categorias')
        ->select('categorias.*')
        ->orderBy('descripcion','DESC')
        ->get();


        $cupones = DB::table('cupones')
        ->select('cupones.*')
        ->orderBy('id','DESC')
        ->get();

        $pdf = DB::table('ofertaspdfs')
        ->select('ofertaspdfs.*')
        ->orderBy('created_at','DESC')
        ->take(1)
        ->get();

        $carrito = DB::table('carritoproductos')
        ->join('productos','productos.id','=','carritoproductos.id_user')
        ->select('carritoproductos.*','productos.nombre as Producto')
        ->orderBy('created_at','DESC')
        ->get();

        return view('layouts.principal', compact('categoria','cupones','pdf','carrito'));
        //return view('welcome');
    }
}

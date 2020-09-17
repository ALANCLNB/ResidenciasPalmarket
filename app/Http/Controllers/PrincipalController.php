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

        return view('layouts.principal', compact('categoria','cupones'));
        //return view('welcome');
    }
}

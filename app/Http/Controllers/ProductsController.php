<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{



    public function index($categoria){

        //$productos = Producto::paginate(2);
     /* $produ = DB::table('productos')
        ->select('productos.*')
        ->orderBy('id','DESC')
        ->get();*/
        $productos =  Producto::where('categoria', $categoria)->paginate(10);
        //$carniceria =  Producto::where('categoria', '2')->paginate(10);

        return view('layouts.products', compact('productos','productos'));
        //return view('welcome');
    }






}

<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{



    public function index($categoria){

        

        $productos =  Producto::where('categoria', $categoria)->paginate(10);
        

        //$carniceria =  Producto::where('categoria', '2')->paginate(10);
        
        $catego = DB::table('categorias') 
        ->select('categorias.*')
        ->orderBy('id','DESC')
        ->get();

        //$tittle = Categoria::where('id', $categoria);

        $tittle2 = DB::table('categorias') 
        ->select('categorias.descripcion')
        ->where('id',$categoria)
        ->get();
        foreach ($tittle2 as $tit) {
           $tittle = $tit->descripcion;
        }
        
        //dd($tittle);
        return view('layouts.products', compact('productos','catego','tittle'));
        //return view('welcome');
    }



    public function search(Request $request){

        $tittle = $request->titulo;
        $buscar = $request->search;
        //dd('1');
        
        
        
            //$query = trim($buscar->get('search'));
            $query = trim($buscar);
            $productos =  Producto::where('nombre', 'LIKE','%'.$query.'%')->paginate(10);
            
            $catego = DB::table('categorias') 
            ->select('categorias.*')
            ->orderBy('id','DESC')
            ->get();

        return view('layouts.products', compact('productos','tittle','catego'));
    }



}

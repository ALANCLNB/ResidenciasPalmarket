<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Carritoproducto;
use Validator;
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





    public function carrito(Request $request){

        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'id_producto' => 'required|min:1|max:5',
            'id_user' => 'required|min:1|max:5',
            'cantidad' => 'required|min:1|max:6',
            'unidad' => 'required|min:1|max:10'

    ]);

    if($validator -> fails()){
        //dd('Llena todos los campos');
        return back()
        ->withInput()
        ->with('ErrorInsert', 'Favor de llenar todos los campos')
        ->withErrors($validator);

    }else{
        //dd('Guardado'.$request->nombre);
        $qys = Carritoproducto::create([
            'id_producto' => $request->id_producto,
            'id_user' => $request->id_user,
            'cantidad' => $request->cantidad,
            'unidad' => $request->unidad

        ]);
        return back()
        ->with('Listo', 'Se ha insertado correctamente');
       
    }
    }








}

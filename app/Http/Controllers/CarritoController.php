<?php

namespace App\Http\Controllers;

use App\Carritoproducto;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class CarritoController extends Controller
{
    
    public function index(){

        $carrito = DB::table('carritoproductos')
        ->where('status','=','0')
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select('carritoproductos.*','productos.nombre as Producto','productos.imagen as Image','productos.precio as Precio',DB::raw("(cantidad * productos.precio) as totalPriceQuantity"))
        ->orderBy('created_at','ASC')
        ->paginate(10);
        
        $carritocant = Carritoproducto::all()->count();

        $valor = DB::table("carritoproductos")
        ->where('status','=','0')
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select(DB::raw("SUM(cantidad * productos.precio) as totalPQ"))
        ->get();

        if (Auth::check()) {
            $count = Carritoproducto::where('id_user','=',Auth::user()->id)
            ->where('status','=','0')
            ->count();

            //cantida de prod con embalaje de kg
            $countKG = Carritoproducto::where('id_user','=',Auth::user()->id)
            ->where('status','=','0')
            ->where('unidad','=','Kg')
            ->count();
            //5 pesos mas por cada articulo con emblaje de KG
            $margenKG = ($countKG*5);
            $totalAprox = ($valor[0]->totalPQ)+($margenKG);

            
        }else{
            $count = 0;}

        $sucursales = \DB::table('sucursales')
        ->orderBy('created_at','DESC')
        ->get();


    return view('layouts.pedidos',compact('carrito','carritocant','count','valor','sucursales','margenKG','totalAprox'));
    }//Llave index 




    


}




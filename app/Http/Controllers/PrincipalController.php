<?php

namespace App\Http\Controllers;

//use App\Categoria;
use App\Sucursale;
use App\Ofertasimg;
use App\Carritoproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{
    public function index(){

        $categoria = DB::table('categorias')
        ->select('categorias.*')
        ->orderBy('descripcion','ASC')
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
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->where('status','=','0')
        ->select('carritoproductos.*','productos.nombre as Producto','productos.imagen as Image','productos.precio as Precio',DB::raw("(cantidad * productos.precio) as totalPriceQuantity"))
        ->orderBy('created_at','ASC')
        ->get();

        if (Auth::check()) {
            $count = Carritoproducto::where('id_user','=',Auth::user()->id)
            ->where('status','=','0')
            ->count();
    
            //dd($valor);
            }else{
                $count = 0;
            }

        $valor = DB::table("carritoproductos")
        ->where('status','=','0')
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select(DB::raw("SUM(cantidad * productos.precio) as totalPQ"))
        ->get();

        $carritocant = Carritoproducto::all()
        ->where('status','=','0')
        ->count();
        
        $carrusel = Ofertasimg::where('created_at', '>=', now()->subDays(7))
        ->get();
        


        $prim = DB::table("sucursales")
        ->orderBy('created_at','ASC')
        ->take(1)
        ->get();
        
        //dd($prim[0]->id);

        $next = DB::table("sucursales")
        ->where('id', '>', 1)
        ->orderBy('id', 'ASC')
        ->get();

        $pdfs = DB::table("ofertaspdfs")
        ->orderBy('created_at','DESC')
        ->take(1)
        ->get();
        
        $pdf = $pdfs[0]->nombre;
        //dd($next);
        return view('layouts.principal', compact('categoria','cupones','pdf','carrito','count','valor','carritocant','carrusel','next','prim','pdf'));
        //return view('welcome');
    }
}

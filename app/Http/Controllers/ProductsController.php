<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Carritoproducto;
use Validator;
use Auth;
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
        $carrito = DB::table('carritoproductos')
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select('carritoproductos.*','productos.nombre as Producto','productos.imagen as Image','productos.precio as Precio',DB::raw("(cantidad * productos.precio) as totalPriceQuantity"))
        ->orderBy('created_at','ASC')
        ->get();
      
        
        $valor = DB::table("carritoproductos")
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select(DB::raw("SUM(cantidad * productos.precio) as totalPQ"))
        ->get();

        $carritocant = Carritoproducto::where('status'==0)->count();

        $tittle2 = DB::table('categorias') 
        ->select('categorias.descripcion')
        ->where('id',$categoria)
        ->get();


        foreach ($tittle2 as $tit) {
           $tittle = $tit->descripcion;
        }

        /*if (Auth::check()) {
           $contador = 5;
        }*/
        if (Auth::check()) {
        $count = Carritoproducto::where('id_user','=',Auth::user()->id)->count();

        

        //dd($valor);
        }else{
            $count = 0;
        }
        //dd($count);
        return view('layouts.products', compact('productos','catego','tittle','carrito','count','valor'));
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

        //esto se necesita por que necesita cargar de nuevo las variables
        $catego = DB::table('categorias') 
        ->select('categorias.*')
        ->orderBy('id','DESC')
        ->get();

        //$tittle = Categoria::where('id', $categoria);
        $carrito = DB::table('carritoproductos')
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select('carritoproductos.*','productos.nombre as Producto','productos.precio as Precio',DB::raw("(cantidad * productos.precio) as totalPriceQuantity"))
        ->orderBy('created_at','ASC')
        ->get();
      
        
        $valor = DB::table("carritoproductos")
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select(DB::raw("SUM(cantidad * productos.precio) as totalPQ"))
        ->get();

        $carritocant = Carritoproducto::all()->count();

        
        $tittle = 'Buscador';
        

        if (Auth::check()) {
            $count = Carritoproducto::where('id_user','=',Auth::user()->id)->count();   
        }else{
            $count = 0;
        }


        return view('layouts.products', compact('productos','tittle','catego','tittle','count','carrito','carritocant','valor','catego'));
    }





    public function carrito(Request $request){
        //dd($request->all());
        //$prod = Carritoproducto::find(1);
       //dd($prod);
      
/*
        $existencia = DB::table('productos')
        ->select('productos.id')
        ->where('id', '=', $request->id_producto)
        ->get();

        
        foreach ($existencia as $exist) {
            $exist->id;
        }
        //dd($exist->id);
        //dd($request->all());
        $id_p = DB::table('carritoproductos')
        ->select('carritoproductos.*')
        ->where('id_producto', '=', $exist->id)
        ->get();

        foreach ($id_p as $id) {
            $id->id;
        }
        //dd();
        if (empty($id->id)) {
           //dd('vacio');
        }else{
            //dd('no vacio');
            $prod = Carritoproducto::find($id->id); 
            
        }
        //dd($prod);*/
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





        $id_u = DB::table('carritoproductos')
        ->select('carritoproductos.*')
        ->where('id_user', '=', Auth::user()->id)
        ->where('id_producto', '=', $request->id_producto)
        ->get();

        


if ($id_u->isEmpty()) {
    //dd('vacio');
    $cart = Carritoproducto::create([
        'id_producto' => $request->id_producto,
        'id_user' => $request->id_user,
        'cantidad' => $request->cantidad,
        'unidad' => $request->unidad,
        'id_pedido' => 0,
        'status' => 0

    ]);
    return back();

}else{
    //dd('no vacio');
    //$prod = Carritoproducto::find($id_u[0]->id);
    //dd($prod->cantidad);

    $prod = Carritoproducto::where('id','=',$id_u[0]->id)->update(['cantidad' => $request->cantidad]);
    
    return back();
    /*$prod->cantidad == ($request->cantidad); 

            $prod->save();
            return back();*/
}






        //dd($request->id_producto, $id_p);
       /* foreach ($id_p as $id) {
            $id->id;
        }*/
        //dd($id_p[]->id);
       /*if ($prod->id_producto == $request->id_producto) {
        dd($prod->id_producto, $request->id_producto);
           $prod->cantidad == ($request->cantidad);
            
           $prod->save();
           return back();
        } */
        
       /* if (!empty($id_p)) {
//dd('no existe');
            $cart = Carritoproducto::create([
                'id_producto' => $request->id_producto,
                'id_user' => $request->id_user,
                'cantidad' => $request->cantidad,
                'unidad' => $request->unidad
    
            ]);
            return back();
        }else{
            
            //dd('que peo');
            $prod = Carritoproducto::find($id->id); 
            //dd($prod->id);
            $prod->cantidad == ($request->cantidad); 

            $prod->save();
            return back();
        }*/
        
        
        
    
       
    }
    }





    public function destroy($id)
    {
        //dd($id);
        $Dcat = Carritoproducto::find($id);

        $Dcat->delete();
        return back();
    } 





}

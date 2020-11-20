<?php

namespace App\Http\Controllers;


use App\Carritoproducto;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class PedidosController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth']);
    }


    public function index(){

if (Auth::user()->rol == 3) {

    $pedidos = DB::table('pedidos') 
        ->where('id_user','=',Auth::user()->id)
        ->join('users','users.id','=','pedidos.id_user')
        ->join('sucursales','sucursales.id','=','pedidos.id_sucursal')
        ->select('pedidos.*','users.email as Correo','sucursales.nombre as Sucursal')
        ->orderBy('id','DESC')
        ->get();
} elseif(Auth::user()->rol == 2) {
    
    $pedidos = DB::table('pedidos') 
        ->where('id_sucursal','=',Auth::user()->sucursal)
        ->join('users','users.id','=','pedidos.id_user')
        ->join('sucursales','sucursales.id','=','pedidos.id_sucursal')
        ->select('pedidos.*','users.email as Correo','sucursales.nombre as Sucursal')
        ->orderBy('id','DESC')
        ->get();
}elseif(Auth::user()->rol == 1) {
    
    $pedidos = DB::table('pedidos')
        ->join('users','users.id','=','pedidos.id_user')
        ->join('sucursales','sucursales.id','=','pedidos.id_sucursal')
        ->select('pedidos.*','users.email as Correo','sucursales.nombre as Sucursal')
        ->orderBy('id','DESC')
        ->get();
}

        

    


        return view('dashboard.pedidos.pedidos',compact('pedidos'));
    }







    public function detallesPedido($id,$cod){

    if (Auth::user()->rol == 3) {

        $pedidos = DB::table('pedidos')
        ->where('id_user','=',Auth::user()->id) 
        ->join('users','users.id','=','pedidos.id_user')
        ->join('sucursales','sucursales.id','=','pedidos.id_sucursal')
        ->select('pedidos.*','users.email as Correo','users.nombre as Name','sucursales.nombre as Sucursal')
        ->orderBy('id','DESC')
        ->get();

    } else {

        $pedidos = DB::table('pedidos') 
        ->join('users','users.id','=','pedidos.id_user')
        ->join('sucursales','sucursales.id','=','pedidos.id_sucursal')
        ->select('pedidos.*','users.email as Correo','users.nombre as Name','sucursales.nombre as Sucursal')
        ->orderBy('id','DESC')
        ->get();
    }

        

        $carritoV = DB::table('carritoproductos')
        ->where('status','=','1')
        ->where('id_pedido','=',$id)
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select('carritoproductos.*','productos.nombre as Producto','productos.imagen as Image','productos.precio as Precio',DB::raw("(cantidad * productos.precio) as totalPriceQuantity"))
        ->orderBy('created_at','ASC')
        ->paginate(10);
       

        $valor = DB::table("carritoproductos")
        ->where('status','=','1')
        ->where('id_pedido','=',$id)
        ->where('carritoproductos.id_user','=',Auth::user()->id)
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select(DB::raw("SUM(cantidad * productos.precio) as totalPQ"))
        ->get();

        $pedi = DB::table('pedidos')
        ->where('id_user','=',Auth::user()->id)
        ->where('codigo','=',$cod)
        ->join('users','users.id','=','pedidos.id_user')
        ->join('sucursales','sucursales.id','=','pedidos.id_sucursal')
        ->select('pedidos.*','users.email as Correo','users.nombre as Name','sucursales.nombre as Sucursal')
        ->orderBy('id','DESC')
        ->get();

        $datos = DB::table('pedidos') 
        ->where('pedidos.id','=',$id)
        ->join('users','users.id','=','pedidos.id_user')
        ->join('sucursales','sucursales.id','=','pedidos.id_sucursal')
        ->select('pedidos.*','users.email as Correo','users.nombre as Name','sucursales.nombre as Sucursal')
        ->get();


        return view('dashboard.pedidos.pedidosDetalle',compact('pedidos','carritoV','valor','datos','pedi'));
    }



    public function store(Request $request){

        $valor = DB::table("carritoproductos")
        ->where('status','=','0')
        ->join('productos','productos.id','=','carritoproductos.id_producto')
        ->select(DB::raw("SUM(cantidad * productos.precio) as totalPQ"))
        ->get();

        $count = Carritoproducto::where('id_user','=',Auth::user()->id)
        ->where('status','=','0')
        ->count();

        $countKG = Carritoproducto::where('id_user','=',Auth::user()->id)
            ->where('status','=','0')
            ->where('unidad','=','Kg')
            ->count();
            //5 pesos mas por cada articulo con emblaje de KG
        $margenKG = ($countKG*5);
        $totalAprox = ($valor[0]->totalPQ)+($margenKG);




        $validator = Validator::make($request->all(),[
            'sucursal' => 'required|min:1|max:5',
            'id_user' => 'required|min:1|max:5'

    ]);

    if($validator -> fails()){
        //dd($request->all());
        
        return back()
        ->withInput()
        ->with(['ErrorInsert'=> 'A ocurrido un error, por favor vuelva a intentarlo'])
        ->withErrors($validator);
        
    }else{

        $code = Auth::user()->id.'_'.rand(11111,99999);

        $cart = Pedido::create([
            'id_sucursal' => $request->sucursal,
            'id_user' => Auth::user()->id,
            'cantidad_articulos' => $count,
            'total' => number_format($totalAprox,2),
            'total_final' => 'No Asignado',
            'codigo' => $code,
            'status' => 0
    
        ]);

        $id_ped = DB::table('pedidos')
        ->where('id_user','=',Auth::user()->id)
        ->select('pedidos.*')
        ->orderBy('id','DESC')
        ->get();

        $carrito = Carritoproducto::where('status','=',0)->update(['status' => 1,'id_pedido' =>$id_ped[0]->id]);

        return back()
        ->withInput()
        ->with(['code'=> 'Codigo','alert'=> 'Updated!'])
        ->withErrors($code);

    }

    }


    public function estado(Pedido $pedido)
    {
        if($pedido->status == '0'){
            $pedido->status = '1';

        }else if($pedido->status = '1'){
            $pedido->status = '2';  
        }

        $pedido->save();
        
        return response()->json($pedido->status);
        
    }


    public function preciofinal(Request $request){
    //dd($request->precio_final);
        $precioPedido = Pedido::find($request->id);

        $validator = Validator::make($request->all(),[
            'precio_final' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            

    ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar correctamente el campo')
            ->withErrors($validator);

        }else{
                $precioPedido->total_final = $request->precio_final;
        
                $precioPedido->save();
                return back()
                ->with('Listo', 'El precio se actualizó correctamente');
        
            }//else imagen
        }///llave function
    

}

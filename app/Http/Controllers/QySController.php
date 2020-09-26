<?php

namespace App\Http\Controllers;

use Validator;
use App\Sucursale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comentario;//modelo al que se va a referir

class QySController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }
   
    
    public function index()
    {

        $qysug = \DB::table('comentarios')
        ->join('sucursales','sucursales.id','=','comentarios.sucursal')
        ->select('comentarios.*','sucursales.nombre as Sucursal')
        ->orderBy('created_at','DESC')
        ->get();

        $sucursales = \DB::table('sucursales')
        ->orderBy('created_at','DESC')
        ->get();

       return view('dashboard.qys.qys',['qysug' => $qysug,'sucursales' => $sucursales]);


        //return view('dashboard.qys.qys');
    }
    
    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'id_user' => 'required|min:1|max:5',
                'email' => 'required|min:3|max:50|email',
                'contenido' => 'required|min:3|max:250',
                'tipo' => 'required|min:1|max:50',
                'sucursal' => 'required|min:1|max:5'

        ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{
            //dd('Guardado'.$request->nombre);
            $qys = Comentario::create([
                'id_user' => $request->id_user,
                'email' => $request->email,
                'contenido' => $request->contenido,
                'tipo' => $request->tipo,
                'sucursal' => $request->sucursal

            ]);
            return back()
            ->with('Listo', 'Se ha insertado correctamente');
           
        }
    }


    public function destroy($id)
    {
        //dd($id);
        $queys = Comentario::find($id);

        $queys->delete();
        return back()->with('Eliminado','El registro fue eliminado con exito.');
    }   

}

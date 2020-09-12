<?php

namespace App\Http\Controllers;

use App\Ofertaspdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfOfertasController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $oferta = DB::table('ofertaspdfs')
        ->select('ofertaspdfs.*')
        ->orderBy('id','DESC')
        ->get();

       return view('dashboard.ofertas.ofertaspdf', compact('oferta'));
        
    }




    public  function store(Request $request)
    {
      /*  $validator = Validator::make($request->all(),[
                'id_user' => 'required|min:3|max:50',
                'archivo' => 'required|min:1|max:3',
                'tipo' => 'required|min:3|max:50',
                'precio' => 'required|min:4|max:10',
                //'imagen' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
                'stock' => 'required|min:1|max:5'
                

        ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{*/


            if ($request->hasFile('archivo')) {
                $file = $request->file('archivo');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/ofertas/pdf/',$name);
                
            }

            //$ArchivoName = time().'.'.$request->archivo->getClientOriginalName();
           // $request->file->move(public_path('/ofertas/pdf/'),$ArchivoName);
      

/*
            $productos = Ofertaspdf::create([
                'nombre' => $request->nombre,
                'id_user' => $request->id_user
            ]);*/
                
            return back()
            ->with('Listo', 'Archivo guardado correctamente');
           
        //}
    }


    public function destroy($id)
    {
        //dd($id);
        $delete = Ofertapdf::find($id);

        $delete->delete();
        return back()->with('Listo','El producto fue eliminado con exito.');
    } 










}

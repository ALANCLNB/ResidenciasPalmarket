<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfOfertasController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $oferta = DB::table('ofertas')
        ->select('ofertas.*')
        ->orderBy('id','DESC')
        ->get();

       return view('dashboard.ofertas.ofertas', compact('oferta'));
        
    }




    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
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

        }else{
         
            $image_file = $request->imagen;

            list($type, $image_file) = explode(';', $image_file);
              list(, $image_file)      = explode(',', $image_file);
      
              $image_file = base64_decode($image_file);
              $image_name= time().'prod'.'.png';
              $path = public_path('/img/'.$image_name);
      
              file_put_contents($path, $image_file);
      


            $productos = Oferta::create([
                'nombre' => $request->nombre,
                'categoria' => $request->categoria,
                'marca' => $request->marca,
                'precio' => $request->precio,
                'imagen' => $image_name,
                //'imagen' => $request->file('imagen'),
                'stock' => $request->stock,
                'precio_ant' =>15.20,
                'id_user' => 1
                
            ]);
                
            return response()->json(['status'=>true]);
           
        }
    }


    public function destroy($id)
    {
        //dd($id);
        $delete = Oferta::find($id);

        $delete->delete();
        return back()->with('Listo','El producto fue eliminado con exito.');
    } 










}

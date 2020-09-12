<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Image;
use App\Mail\TestMail;
use App\Producto,Categoria;//modelo al que se va a referir
class ProductosController extends Controller
{

  
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $prod = DB::table('productos')
        ->join('users','users.id','=','productos.id_user')
        ->join('categorias','categorias.id','=','productos.categoria')
        ->select('productos.*',
        'users.nombre as Usernombre',
        'categorias.descripcion as Cateid')
        ->orderBy('id','ASC')
        ->get();

        $categoria = DB::table('categorias')
        ->select('categorias.*')
        ->orderBy('descripcion','DESC')
        ->get();

       // $productos = \DB::table('productos')
        //->where('created_at', '>=', now()->subDays(7))
       // ->select('productos.*')
       // ->orderBy('id','DESC')
        //->get();

       return view('dashboard.productos.productos',['prod' => $prod , 'categoria' => $categoria]);
        //return view('dashboard.productos.productos');
    }
   


    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|min:3|max:50',
                'categoria' => 'required|min:1|max:3',
                'marca' => 'required|min:3|max:50',
                'precio' => 'required|min:4|max:10',
                //'imagen' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
                
                //'precio_ant' => 'required|min:5|max:50',
                'stock' => 'required|min:1|max:5'
                //'id_user' => 'required|min:1|max:5'

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
      
              

            //$image_name= time().'prod'.'.png';
            
        
        
            //dd('Guardado'.$request->nombre);
            /*$imag = $request->file('imagen');
            $nombre = time().'.'.$imag->getClientOriginalExtension();
            $destino = public_path('img/productos');
            $request->imagen->move($destino,$nombre);
            $red = Image::make($destino.'/'.$nombre);
            $red->resize(400,300,function($constraint){
                $constraint->aspectRatio();
            });

            $red->save($destino.'/thumbs/'.$nombre);
*/
    
          
            //dd('si se subio');

            $productos = Producto::create([
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
        $Dprod = Producto::find($id);

        $Dprod->delete();
        return back()->with('Listo','El producto fue eliminado con exito.');
    } 

    




    public function editar(Request $request)
    {
        //dd($request);
        $prod = Producto::find($request ->id);


        $validator = Validator::make($request->all(),[
            'nombre' => 'required|min:3|max:50',
            'categoria' => 'required|min:1|max:3',
            'marca' => 'required|min:3|max:50',
            'precio' => 'required|min:4|max:10',
            'stock' => 'required|min:1|max:5'

    ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{

            $image_file = $request->image;

            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
      
              $image_file = base64_decode($image_file);
              $image_name= time().'prod'.'.png';
              $path = public_path('/img/'.$image_name);
              
              //dd($prod);
              
              //file_put_contents($path, $image_file);
              
               
           
              $image_path = public_path('/img/'.$prod->imagen);  // Value is not URL but directory file path
              
              unlink($image_path);
              file_put_contents($path, $image_file);

/*
              if(File::exists($image_path)) {
                  File::delete($image_path);
                  file_put_contents($path, $image_file);
              }*/
              
            
            
            $prod ->nombre = $request ->nombre;
            $prod ->categoria = $request ->categoria;
            $prod ->marca = $request ->marca;
            $prod ->precio = $request ->precio;
            $prod ->stock = $request ->stock;
            $prod ->oferta = $request ->oferta;
            $prod ->imagen = $image_name;


            /*
                'nombre' => $request->nombre,
                'categoria' => $request->categoria,
                'marca' => $request->marca,
                'precio' => $request->precio,
                'imagen' => $image_name,
                'stock' => $request->stock,
                'precio_ant' =>15.20,
                'id_user' => 1
*/

            $prod->save();
            return response()->json(['status'=>true]);
            /*return back()
            ->with('Listo', 'El usuario se actualizo correctamente');*/

        }//else validator

    }






}

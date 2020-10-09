<?php

namespace App\Http\Controllers;

use Validator;
use App\Mail\TestMail;
use Illuminate\Http\Request;
//use Image;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Intervention\Image\ImageManagerStatic as Image;
use App\Producto,Categoria;//modelo al que se va a referir

class ProductosController extends Controller
{

  
    public function __construct(){
        $this->middleware(['auth','authadmin']);
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
        $messages = [
            'imagen.required'    => 'se reuiere una imagen'
         ];
        //dd($request->all());
       $validator = Validator::make($request->all(),[
                'nombre' => 'required|min:2|max:50',
                'categoria' => 'required|min:1|max:4',
                'marca' => 'required|min:2|max:50',
                'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'embalaje' => 'required',
                //'imag' => 'required|mimes:jpg,jpeg,png,gif,svg',
                //'prueba' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
                'imagen' => 'required|regex:/^(image)\/(\w)+$/',
                //'Imagen' => 'numeric|max:3',
                //'prueba' => 'required',
                //'precio_ant' => 'required|min:5|max:50',
                'stock' => 'required|min:1|numeric',
                'id_user' => 'required|min:1|max:5'

        ]);

        if($validator -> fails()){
            //dd($request->prueba);
            
            return response()->json(['code'=>401,'msg'=>$validator->errors()->all(),'valid'=>$messages]);
            //return response()->json($request->all());
            //return response()->json(['code'=>401,'msg'=>json_encode($validator->errors()->all())]);

           /* return Response::json(array(
                'success'=>false,
                'errors' =>$validator->getMessageBag()->toArray()
            ),400);*/

            

            //return response()->json(array('status'=>'success', 'error'=>'Success!'));

            //dd($validator);
            //return response()->json(Input::all());
            
            //return $validator->getMessageBag()->toarray();
            //return response()->json(['status'=>false]);
            /*return response()->json();

            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);*/
            //dd($validator);
        }else{
         
            $image_file = $request->imag;

            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
      
              $image_file = base64_decode($image_file);
              $image_name= time().'prod'.'.webp';
              $path = public_path('/img/'.$image_name);
      
              //file_put_contents($path, $image_file);
      
              Image::make($image_file)
                    ->resize(400,300, function ($constraint){ 
                        $constraint->aspectRatio();
                    })
                    ->save($path,72);

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
                'oferta' => $request->oferta,
                'precio' => $request->precio,
                'imagen' => $image_name,
                //'imagen' => $request->file('imagen'),
                'stock' => $request->stock,
                'embalaje' => $request->embalaje,
                'precio_ant' =>00.00,
                'id_user' => $request->id_user
                
            ]);
                
            return response()->json(['status'=>true]);
           
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $Dprod = Producto::find($id);

        $imagen = $Dprod->imagen;
      
            unlink(public_path('/img/'.$imagen)); 


        $Dprod->delete();
        return back()->with('Listo','El producto fue eliminado con exito.');
    } 

    




    public function editar(Request $request)
    {
        //dd($request->all());
        $prod = Producto::find($request ->id);


       $validator = Validator::make($request->all(),[
            'nombre' => 'required|min:2|max:50',
            'categoria' => 'required|min:1|max:3',
            'marca' => 'required|min:2|max:50',
            'precio' => 'required|min:4|max:10',
            'stock' => 'required|min:1|max:5',
            'imagen' => 'regex:/^(image)\/(\w)+$/',
            'id_user' => 'required|min:1|max:5'

    ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            //dd($request->imagen);
            return response()->json(['code'=>401,'msg'=>$validator->errors()->all()]);

        }else{
            //dd($request->imagen);
            
            
                ////////INFORMACION QUE MANDA EL CROPPIE AL ESTAR VACIO//////////
           // if ($request->image == 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAEsCAYAAADtt+XCAAAB6ElEQVR4nO3BMQEAAADCoPVPbQ0PoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHg3VJUAAfkd0+cAAAAASUVORK5CYII=') {
           //SOLO GUARDA LOS CAMPOS SI LA LONGITUD DE LA IMAGEN (BASE64) ES MENOR A 5000 CARACTERES, LO SUAL ES LO QUE MANDA EL CROPPIE CUANDO ESTA VACIO
            if(strlen ($request->image) < 5000){
                    $prod ->nombre = $request ->nombre;
                    $prod ->categoria = $request ->categoria;
                    $prod ->marca = $request ->marca;
                    $prod ->precio = $request ->precio;
                    $prod ->precio_ant = $request ->precio_ant;
                    $prod ->stock = $request ->stock;
                    $prod ->id_user = $request ->id_user;
                    $prod ->embalaje = $request ->embalaje;
                    $prod ->oferta = $request ->oferta;
                    
                    $prod->save();
                    return response()->json(['status'=>true]);

            } else {
                //////////SI SE CARGO IMAGEN SE ACTUALIZA/////////////
                    $image_file = $request->image;

                    list($type, $image_file) = explode(';', $image_file);
                    list(, $image_file)      = explode(',', $image_file);
            
                    $image_file = base64_decode($image_file);
                    $image_name= time().'prod'.'.webp';
                    $path = public_path('/img/'.$image_name);
                    
                    //dd($prod);
                    //file_put_contents($path, $image_file);
                    
                    $image_path = public_path('/img/'.$prod->imagen);  // Value is not URL but directory file path
                    
                    /*unlink($image_path);
                    //file_put_contents($path, $image_file);
                    Image::make($image_file)
                    ->resize(400,300, function ($constraint){ 
                        $constraint->aspectRatio();
                    })
                    ->save($path,72);*/
                    if (file_exists(public_path('/ofertas/img/'.$request->nombre))) {
                        unlink($image_path);    
                        //file_put_contents($path, $image_file);
                      Image::make($image_file)
                        ->resize(400,300, function ($constraint){ 
                        $constraint->aspectRatio();
                  })
                  ->save($path,72);
                        //dd('SIIII');
                  }else{
                        //
                       //file_put_contents($path, $image_file);
                      Image::make($image_file)
                        ->resize(400,300, function ($constraint){ 
                        $constraint->aspectRatio();
                  })
                  ->save($path,72);
                       //dd('NoOOO');
                  }

                    
                    $prod ->nombre = $request ->nombre;
                    $prod ->categoria = $request ->categoria;
                    $prod ->marca = $request ->marca;
                    $prod ->precio = $request ->precio;
                    $prod ->precio_ant = $request ->precio_ant;
                    $prod ->stock = $request ->stock;
                    $prod ->id_user = $request ->id_user;
                    $prod ->embalaje = $request ->embalaje;
                    $prod ->oferta = $request ->oferta;
                    $prod ->imagen = $image_name;


                    $prod->save();
                    return response()->json(['status'=>true]);
            
            }//else imagen


        }//else validator



    }//public editar


}

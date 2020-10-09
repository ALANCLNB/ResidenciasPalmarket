<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Categoria;

class CategoriasController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth','authadmin']);
    }


    public function index()
    {
        $cate = \DB::table('categorias')
        //->where('created_at', '>=', now()->subDays(7))
        ->join('users','users.id','=','categorias.id_user')
        ->select('categorias.*','users.nombre as Usernombre')
        ->orderBy('id','DESC')
        ->get();

       return view('dashboard.categorias.categorias',['cate'=>$cate]);

       //return view('dashboard.categorias.categorias', compact('cate'));

    }

    public  function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),[
                'id_user' => 'required|min:1|max:3',
                'descripcion' => 'required|min:1|max:50',
                'imagen' => 'required|regex:/^(image)\/(\w)+$/'
                //'token' => 'required|min:1|max:3',
                //'imagen' => 'required|min:3|max:100'

        ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return response()->json(['code'=>402,'msg'=>$validator->errors()->all()]);
           /* return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);*/

        }else{
            //dd('Guardado'.$request->nombre);
            //$categorias = Categoria::create([
               /* 'id_user' => $request->id_user,
                'descripcion' => $request->descripcion
                //'token' => $request->token           
            //]);
            return back()
            ->with('Listo', 'Se ha insertado el producto correctamente');*/
            $image_file = $request->image;

            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
      
              $image_file = base64_decode($image_file);
              $image_name= time().'cate'.'.png';
              $path = public_path('/img/categorias/'.$image_name);
      
              //file_put_contents($path, $image_file);
              Image::make($image_file)
                    ->resize(400,300, function ($constraint){ 
                    $constraint->aspectRatio();
              })
              ->save($path,72);
              

            //dd('si se subio');

            $categorias = Categoria::create([
                'id_user' => $request->id_user,
                'descripcion' => $request->descripcion,
                'imagen' => $image_name
                
            ]);
                
            return response()->json(['status'=>true]);
           
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $Dcat = Categoria::find($id);

        $imagen = $Dcat->imagen;


        if ($imagen == '') {
            $Dcat->delete();
            return back()->with('Listo','La categoria fue eliminada con exito.');

        } elseif (!file_exists(public_path('/img/categorias/'.$imagen))){
            $Dcat->delete();
            return back()->with('Listo','La categoria fue eliminada con exito.');

        }else{
            unlink(public_path('/img/categorias/'.$imagen));
            $Dcat->delete();
            return back()->with('Listo','La categoria fue eliminada con exito.');
        }
            
    } 






    public function editar(Request $request)
    {
        //dd($request);
        $cate = Categoria::find($request ->id);


        $validator = Validator::make($request->all(),[
            'id_user' => 'required|min:1|max:3',
            'descripcion' => 'required|min:1|max:50',
            'imagen' => 'regex:/^(image)\/(\w)+$/'

    ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            
            return response()->json(['code'=>401,'msg'=>$validator->errors()->all()]);

        }else{
/*
            $cate ->id_user = $request ->id_user;
            $cate ->descripcion = $request ->descripcion;
            
            $cate->save();
            return back()
            ->with('Listo', 'El usuario se actualizo correctamente');
        }//else validator
*/


            //if ($request->image == 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAEsCAYAAADtt+XCAAAB6ElEQVR4nO3BMQEAAADCoPVPbQ0PoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHg3VJUAAfkd0+cAAAAASUVORK5CYII=') {
                //SOLO GUARDA LOS CAMPOS SI LA LONGITUD DE LA IMAGEN (BASE64) ES MENOR A 5000 CARACTERES, LO CUAL ES LO QUE MANDA EL CROPPIE CUANDO ESTA VACIO
                if(strlen ($request->image) < 5000){
                    $cate ->id_user = $request ->id_user;
                    $cate ->descripcion = $request ->descripcion;
                    
                    $cate->save();
                    return response()->json(['status'=>true]);

                } else {
                //////////SI SE CARGO IMAGEN SE ACTUALIZA/////////////
                    $image_file = $request->image;

                    list($type, $image_file) = explode(';', $image_file);
                    list(, $image_file)      = explode(',', $image_file);
            
                    $image_file = base64_decode($image_file);
                    $image_name= time().'cate'.'.png';
                    $path = public_path('/img/categorias/'.$image_name);
                    
                    //dd($prod);
                    //file_put_contents($path, $image_file);
                    
                    $image_path = public_path('/img/categorias/'.$cate->imagen);  // Value is not URL but directory file path
                    
                    ///////////VALIDAR SI LA IMAGEN EXISTE EN LA BD Y EN LA CARPETA///////////
                    if ($cate->imagen == '') {
                        file_put_contents($path, $image_file);

                    } elseif (file_exists($image_path)){

                        unlink($image_path);
                        //file_put_contents($path, $image_file);
                        Image::make($image_file)
                            ->resize(400,300, function ($constraint){ 
                            $constraint->aspectRatio();
                    })
                    ->save($path,72);

                    }else{

                        //file_put_contents($path, $image_file);
                        Image::make($image_file)
                            ->resize(400,300, function ($constraint){ 
                            $constraint->aspectRatio();
                    })
                    ->save($path,72);
                    }
                    
                    

                    $cate ->id_user = $request ->id_user;
                    $cate ->descripcion = $request ->descripcion;
                    $cate ->imagen = $image_name;


                    $cate->save();
                    return response()->json(['status'=>true]);
            
            }//else imagen
        }
    }







}

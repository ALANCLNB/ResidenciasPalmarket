<?php

namespace App\Http\Controllers;
use Image;
use Validator;
use App\Ofertasimg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImgOfertasController extends Controller
{
    public function __construct(){
      $this->middleware(['auth','authadmin']);
    }
    
    public function index()
    {
        $ofertaimg = DB::table('ofertasimgs')
        ->join('users','users.id','=','ofertasimgs.id_user')
        ->select('ofertasimgs.*','users.nombre as Usernombre')
        ->orderBy('id','DESC')
        ->get();


       return view('dashboard.ofertas.ofertasimg', compact('ofertaimg'));
        
    }






    public  function store(Request $request)
    {
      dd($request->all());
      /* $validator = Validator::make($request->all(),[
                'id_user' => 'required|min:1|max:50',
                'nombre' => 'required|min:3|max:30'
        ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{*/

            $image_file = $request->image;

            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
      
              $image_file = base64_decode($image_file);
              $image_name= time().'oferta'.'.png';
              $path = public_path('/ofertas/img/'.$image_name);
      
              file_put_contents($path, $image_file);
      
              $IOferta = Ofertasimg::create([
                'nombre' => $image_name,
                'id_user' => $request->id_user
                
                
            ]);

            
            return response()->json(['status'=>true]);
           
            //}
    }


    public function destroy($id)
    {
        //dd($id);

        $borrar = Ofertasimg::find($id);
        $imagen =$borrar->nombre;

        unlink(public_path('/ofertas/img/'.$imagen)); 
        
        $borrar->delete();
        return back()->with('Listo','La imagen fue eliminada con exito.');
    } 



    public function editar(Request $request)
    {
        //dd(Ofertasimg::find($request ->id));
       $ioferta = Ofertasimg::find($request ->id);



            $image_file = $request->image;

            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
      
              $image_file = base64_decode($image_file);
              $image_name= time().'oferta'.'.png';
              $path = public_path('/ofertas/img/'.$image_name);
            
                //dd($request->nombre);

              $image_path = public_path('/ofertas/img/'.$request->nombre);  // Value is not URL but directory file path
              

              if (file_exists(public_path('/ofertas/img/'.$request->nombre))) {
                    unlink($image_path);    
                    file_put_contents($path, $image_file);
                    //dd('SIIII');
              }else{
                    //
                   file_put_contents($path, $image_file);
                   //dd('NoOOO');
              }

              //dd($ioferta);
           
           $ioferta ->nombre = $image_name;
           $ioferta ->id_user = $request ->id_user;


         
           $ioferta->save();
           return response()->json(['status'=>true]);
            

        

    }









}

<?php

namespace App\Http\Controllers;

use Validator;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\User;

use App\Ofertasimg;
use App\Ofertaspdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfOfertasController extends Controller
{


    public function __construct(){
        $this->middleware(['auth','authadmin']);
    }
    
    public function index()
    {
        $oferta = DB::table('ofertaspdfs')
        ->join('users','users.id','=','ofertaspdfs.id_user')
        ->select('ofertaspdfs.*','users.nombre as Usernombre')
        ->orderBy('id','DESC')
        ->get();

       return view('dashboard.ofertas.ofertaspdf', compact('oferta'));
        
    }




    public  function store(Request $request)
    {
       
       $validator = Validator::make($request->all(),[
                'id_user' => 'required|min:1|max:5',
                'archivo' => 'required|mimetypes:application/pdf|max:3000'
                
                

        ]);

        if($validator -> fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{

            if ($request->hasFile('archivo')) {
                $file = $request->file('archivo');
                $name = time().'_PDF_'.$file->getClientOriginalName();
               
                
                    if (file_exists(public_path('/ofertas/pdf/'.$request->archivo))) {
                        unlink(public_path().'/ofertas/pdf/',$name);    
                        $file->move(public_path().'/ofertas/pdf/',$name);
                        
                    }else{
                        
                        $file->move(public_path().'/ofertas/pdf/',$name);
                    
                    }
                //$file->move(public_path().'/ofertas/pdf/',$name);
                
            }

            //$ArchivoName = time().'.'.$request->archivo->getClientOriginalName();
           // $request->file->move(public_path('/ofertas/pdf/'),$ArchivoName);
      


            $pdf = Ofertaspdf::create([
                'nombre' => $name,
                'id_user' => $request->id_user
            ]);
                
            /////////////Enviar E-mail a todos los usuarios registrados////////////////
            $correos = User::pluck('email')->toArray();

            Mail::send('correo.correo',[],function($message )use($correos) {               
               $message->to($correos,'')
               ->subject("Boletin de ofertas");
               

           });

            return back()
            ->with('Listo', 'Archivo guardado correctamente');


           
        }
    }



    public function destroy($id)
    {
        //dd($id);
        $deletePDF = Ofertaspdf::find($id);
        //dd($deletePDF->nombre);
        $nombre = $deletePDF->nombre;
        
        if (file_exists(public_path('/ofertas/pdf/'.$nombre))) {
            unlink(public_path('/ofertas/pdf/'.$nombre));        
        }else{                       
            unlink(public_path('/ofertas/pdf/'.$nombre));                  
        } 

        $deletePDF ->delete();
        return back()->with('Listo','El archivo fue eliminado con exito.');
    } 




    public function editar(Request $request)
    {        
        //dd($request ->id);
       $pdfoferta = Ofertaspdf::find($request ->id);       

       $validator = Validator::make($request->all(),[
        'id_user' => 'required|min:1|max:5',
        'archivo' => 'required|mimetypes:application/pdf|max:3000'        
        ]);

            if($validator -> fails()){
                return back()
                ->withInput()
                ->with('ErrorInsert', 'Favor de llenar todos los campos')
                ->withErrors($validator);        

            }else{    
              
              if ($request->hasFile('archivo')) {
                $file = $request->file('archivo');
                $name = time().'_PDF_'.$file->getClientOriginalName();
               
                
                    if (file_exists(public_path('/ofertas/pdf/'.$request->archivo))) {
                        unlink(public_path().'/ofertas/pdf/',$name);    
                        $file->move(public_path().'/ofertas/pdf/',$name);
                        
                    }else{                       
                        $file->move(public_path().'/ofertas/pdf/',$name);                  
                    }           
                
            }
           //dd($pdfoferta ->nombre);
           $pdfoferta ->nombre = $name;
           $pdfoferta ->id_user = $request ->id_user;


         
           $pdfoferta->save();
           return back()
           ->with('Listo', 'Se ha editado el archivo correctamente');
            
        }//else validator
        

    }








}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Categoria;

class CategoriasController extends Controller
{
    
    public function __construct(){
    $this->middleware('auth');
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
        $validator = Validator::make($request->all(),[
                'id_user' => 'required|min:1|max:3',
                'descripcion' => 'required|min:1|max:50',
                'token' => 'required|min:1|max:3',
                //'imagen' => 'required|min:3|max:100'

        ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{
            //dd('Guardado'.$request->nombre);
            $categorias = Categoria::create([
                'id_user' => $request->id_user,
                'descripcion' => $request->descripcion,
                'token' => $request->token
            
                

            ]);
            
            return back()
            ->with('Listo', 'Se ha insertado el producto correctamente');
           
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $Dcat = Categoria::find($id);

        $Dcat->delete();
        return back()->with('Listo','La categoria fue eliminada con exito.');
    } 






    public function editar(Request $request)
    {
        //dd($request);
        $cate = Categoria::find($request ->id);


        $validator = Validator::make($request->all(),[
            'id_user' => 'required|min:1|max:3',
            'descripcion' => 'required|min:1|max:50'

    ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{

            $cate ->id_user = $request ->id_user;
            $cate ->descripcion = $request ->descripcion;
            



            $cate->save();
            return back()
            ->with('Listo', 'El usuario se actualizo correctamente');

        }//else validator

    }







}

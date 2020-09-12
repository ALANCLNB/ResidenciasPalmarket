<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Role;//modelo al que se va a referir

class RolesController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $role = \DB::table('roles')
        //->where('created_at', '>=', now()->subDays(7))
        ->join('users','users.id','=','roles.id_user')
        ->select('roles.*','users.nombre as Usernombre')
        ->orderBy('id','DESC')
        ->get();

       return view('dashboard.roles.roles',['role'=>$role]);

       //return view('dashboard.categorias.categorias', compact('cate'));

    }

    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'id_user' => 'required|min:1|max:3',
                'descripcion' => 'required|min:3|max:80'

        ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{
            //dd('Guardado'.$request->nombre);
            //dd($request);
            $categorias = Role::create([
                'id_user' => $request->id_user,
                'descripcion' => $request->descripcion
                

            ]);
            
            return back()
            ->with('Listo', 'Se ha insertado el rol correctamente');
           
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $Dcat = Role::find($id);

        $Dcat->delete();
        return back()->with('Listo','El rol fue eliminada con exito.');
    } 





    public function editar(Request $request)
    {
        //dd($request);
        $rol = Role::find($request ->id);


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

            $rol ->id_user = $request ->id_user;
            $rol ->descripcion = $request ->descripcion;
            



            $rol->save();
            return back()
            ->with('Listo', 'El usuario se actualizo correctamente');

        }//else validator

    }






}

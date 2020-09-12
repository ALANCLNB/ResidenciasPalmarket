<?php

namespace App\Http\Controllers;

use Validator;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Hash;//incriptar contrase;as
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User,Role,Sucursale;//modelo al que se va a referir

class UsuariosController extends Controller
{
    
    //
    public function __construct(){
        $this->middleware('auth');
    }


    
   public function index()
   {

    
       //$this->sendMail();


        $usuarios = \DB::table('users')
        //->where('created_at', '>=', now()->subDays(27))
        ->join('sucursales','sucursales.id','=','users.sucursal')
        ->join('roles','roles.id','=','users.rol')
        ->select('users.*','sucursales.nombre as Sucursal','roles.descripcion as Rol')
        ->orderBy('id','DESC')
        ->get();
       

        $rol = DB::table('roles')
        ->select('roles.*')
        ->orderBy('descripcion','DESC')
        ->get();

        $sucu = DB::table('sucursales')
        ->select('sucursales.*')
        ->orderBy('nombre','DESC')
        ->get();


       return view('dashboard.usuarios.usuarios',compact('usuarios','rol','sucu'));//'usuarios,variable,variable' para poner varis variables a enviar
   } 

    public  function store(Request $request)
    {
       

        $validator = Validator::make($request->all(),[
                'nombre' => 'required|min:3|max:50',
                'apellidos' => 'required|min:3|max:50',
                'email' => 'required|min:3|max:50|email',
                'pass1' => 'required|min:3|max:50|required_with:pass2|same:pass2',
                'pass2' => 'required|min:3|max:50',
                //'imagen' => 'required|min:3|max:50',
                'rol' => 'required|min:1|max:5',
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
            //dd('Guarado'.$request->pass1);
            

            $usuario = User::create([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => Hash::make($request->pass1),
                'imagen' => 'default.jpg',
                'rol' => $request->rol,
                'sucursal' => $request->sucursal

            ]);

           // $users = User::pluck('email');
           // Mail::to($users)->send(new TestEmail($data));
        


            return back()
            ->with('Listo', 'Se ha insertado correctamente');
           
        }
    }


    private function sendMail(){
           
                //$data['title'] = "Prueba";
                //$dest = User::pluck('email')->toArray();
               //dd($us);
            //$dest = "steamgames848@gmail.com";
           /*$us = \DB::table('users')
            ->select('users.email')
            ->get()->toArray();*/
           //dd($us);
            /*    
            $mails =[];
            foreach ($us as $mail2) {
                $mails =[$mail2->email];
            }*/
            //$mails=['steamgames848@gmail.com', 'doshdijsa@hgmail.com'] ;   
            
            $correos = User::pluck('email')->toArray();

            Mail::send('correo.correo',[],function($message )use($correos) {               
                $message->to($correos,'')
                ->subject("Boletin de ofertas");
 
            });  
    }





    public function destroy($id)
    {
        //dd($id);
        $Duser = User::find($id);

        $Duser->delete();
        return back()->with('Listo','El usuario fue eliminado con exito.');
    } 








    public function editar(Request $request)
    {
        //dd($request);
        $user = User::find($request ->id);


        $validator = Validator::make($request->all(),[
            'nombre' => 'required|min:3|max:50',
            'apellidos' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50|email',
            'rol' => 'required|min:1|max:5',
            'sucursal' => 'required|min:1|max:5'

    ]);

        if($validator -> fails()){
            //dd('Llena todos los campos');
            return back()
            ->withInput()
            ->with('ErrorInsert', 'Favor de llenar todos los campos')
            ->withErrors($validator);

        }else{

            $user ->nombre = $request ->nombre;
            $user ->apellidos = $request ->apellidos;
            $user ->email = $request ->email;
            $user ->rol = $request ->rol;
            $user ->sucursal = $request ->sucursal;

            $validator2 = Validator::make($request ->all(),[
                'pass1' => 'required|min:3|max:50|required_with:pass2|same:pass2',
                'pass2' => 'required|min:3|max:50'
            ]);
            if (!$validator2 ->fails()){
                $user ->password = Hash::make($request ->pass1);
            }



            $user->save();
            return back()
            ->with('Listo', 'El usuario se actualizo correctamente');

        }//else validator

    }







    public function estado(User $usuario)
    {
        if($usuario->estado == '1'){
            $usuario->estado = '0';
        }else{
            $usuario->estado = '1';  
        }

        $usuario->save();
        
        return response()->json($usuario->estado);
        //dd($usuario);


       /* $user = User::find($request ->id);

        $user ->estado = $request ->estado;
        $user->save();
            return back()
            ->with('Listo', 'El estado se actualizo correctamente');*/
    }


    
    public function correo(Request $request)
    {

        $users = UserDB::table('users')->all();

        foreach ($users as $user) {
            Mail::send('Html.view', $data, function ($message) use ($user) {
                $message->from('cicon820@gmail.com', 'AORUS');
                $message->to($user->email, $user->nombre);
                $message->subject('PRUEBAAAAAAAAAA');
            });
        }
        
        return back()
            ->with('Listo', 'El usuario se actualizo correctamente');

    }

}

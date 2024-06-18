<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    
    /*Tipos de usuarios
        * 1 = Usuario 
        * 2 = Centro de Canjeo
        * 3 = Administrador
    */
        
    /// Esta funcion nos muestra las pantallas de registro segun el tipo de usuario que se desee crear
    public function show( $tipo ){

        //Si el usuario ya se encuentra registrado lo redirecciona a su pantalla correspondiente
        if(Auth::check()){
            return redirect('/usuarios');
        }

        if ( $tipo == 1 ) {
            return view ('auth.register_usuario');
        } else if ( $tipo == 2 ) {
            return view ('auth.register_centrodecanjeo');
        } else if ( $tipo == 3 ) {
            return view ('auth.register_admi');
        }

    }

    /// Esta funcion registra el usuario dependiendo de su tipo
    public function register(Request $request){

      ///Validamos que los usuarios cumplan ciertos requisitos segun su tipo para registrarse
        // USUARIO
        if ( $request->tipo == 1 ) {   
            $arr_reglas = [

                'nombre'=>'required | regex:/^[\pL\s\-]+$/u',
                'primer_ap'=>'required | regex:/^[\pL\s\-]+$/u',
                'segundo_ap'=>'required | regex:/^[\pL\s\-]+$/u',
                'correo_inst'=>'required|email|unique:users,correo_inst',
                'correo_personal'=>'required|email|unique:users,correo_personal',
                'carrera'=>'required | regex:/^[\pL\s\-]+$/u',
                'grupo'=>'required',
                'username'=>'required|unique:users,username',
                'password'=>'required|min:8',
                'password_confirmada'=>'required|same:password',
                'matricula'=>'required|max:11||min:10|unique:users,matricula| regex:/^[a-zA-Z0-9]+$/u',
                'tipo' => 'required|between:1,3',
            ];
                
        // CENTRO DE CANJEO
        } else if ( $request->tipo == 2 ) {
            $arr_reglas = [

                'nombre'=>'required | regex:/^[\pL\s\-]+$/u',
                'primer_ap'=>'required | regex:/^[\pL\s\-]+$/u',
                'segundo_ap'=>'required | regex:/^[\pL\s\-]+$/u',
                'correo_personal'=>'required|email|unique:users,correo_personal',
                'username'=>'required|unique:users,username',
                'verificador'=>'required|in:axolatita_212048',
                'password'=>'required|min:8',
                'password_confirmada'=>'required|same:password',
                'tipo' => 'required|between:1,3',
            ];
        // Admi
        } else if ( $request->tipo == 3 ) {
            $arr_reglas = [

                'nombre'=>'required | regex:/^[\pL\s\-]+$/u',
                'primer_ap'=>'required | regex:/^[\pL\s\-]+$/u',
                'segundo_ap'=>'required | regex:/^[\pL\s\-]+$/u',
                'correo_personal'=>'required|email|unique:users,correo_personal',
                'username'=>'required|unique:users,username',
                'clave_guadalupe'=>'required|in:axolatita_212048',
                'clave_anna'=>'required|in:axolatita_212009',
                'clave_carlos'=>'required|in:axolatita_212023',
                'clave_victor'=>'required|in:axolatita_212024',
                'password'=>'required|min:8',
                'password_confirmada'=>'required|same:password',
                'tipo' => 'required|between:1,3',
            ];
        }

        /// Registramos al usuario no sin antes corroborar que las validaciones de  $arr_reglas  sean cumplidas
        $user = User::create($request->validate( $arr_reglas ) );
        return redirect('/login')->with('success', 'Te has registrado de Forma Exitosa');

    }
}

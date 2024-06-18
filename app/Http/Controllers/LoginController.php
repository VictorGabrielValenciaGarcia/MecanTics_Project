<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;

/*
Ejemplo tomado de:
https://github.com/marcosrivasr/login-laravel
*/

class LoginController extends Controller
{

    /// Esta funcion muestra la pantalla de login
    public function show(){
        //Si el usuario ya se encuentra registrado lo redirecciona a su pantalla correspondiente
        if(Auth::check()){
            return redirect('/usuarios');
        }
        
        //Sino, muestra el login
        return view ('auth.login');
               
    }

    /// Esta funcion realiza el logueo
    /// Las validaciones estan en el doc Request/LoginRequest
    public function login(LoginRequest $request){

        // Obtenemos las credenciales del usuario (username y contraseña)
        $credentials = $request->getCredentials();

        // Si los campos no existen o no concuerdan
        if (!Auth::validate($credentials)){
            return redirect()->to('/login')->withErrors('Usuario y/o contraseña incorrectos');
        }

        // Si los campos si existen y concuerdan - Logueamos al usuario
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);

    }

    /// Esta funcion redirige al ususario una vez que se ha confirmado su existencia y validaciones
    public function authenticated(Request $request, $user){
        return redirect('usuarios');
    }

}

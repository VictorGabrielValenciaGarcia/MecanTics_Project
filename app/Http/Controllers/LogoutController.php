<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
    */

    /// Esta funcion permite al usuario cerrar su sesión
    public function logout(){
        Session::flush(); //Se limpia la sesion
        
        Auth::logout(); //Se cierra la sesion para el usuario

        return redirect()->to('/'); //Volvemos a la pagina de inicio
    }
}
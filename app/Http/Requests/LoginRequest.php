<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        // Activamos este request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
    */

    /// Este objeto nos permite validar la información que el cliente esta enviando para poder iniciar su sesión
    public function rules()
    {
        return [
            'username'=>'required',
            'password'=>'required'
        ];
    }

    // Obtenemos las credenciales que el ususario presenta para poder iniciar su sesión
    public function getCredentials(){
        //Recogemos el username
        $username = $this->get('username');

        /// Manda a llamar a isEmail para ver con que deseea el usuario registrarse: Correo personal o username
        // Si quiere ingresar con su correo personal entenoces:
        if($this->isEmail($username)){
            return[
                'correo_personal'=>$username,
                'password'=>$this->get('password')
            ];
            //Regresamos como credencial el correo y contraseña ingresada
        }

        //De lo contrario regresamos como credencial el username y contraseña ingresada
        return $this->only('username','password');
    }

    // Esta funcion nos revisa si el usuario deseea ingresar con su correo personal 
    public function isEmail($value){
        $factory= $this->container->make(ValidationFactory::class);

        return !$factory->make(['username'=>$value], ['username'=>'email'])->fails();
    }
}

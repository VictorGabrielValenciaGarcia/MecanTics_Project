<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ChangeImage extends FormRequest
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
    
    /// Este objeto nos permite validar la información que el cliente esta enviando para poder ejecutar el cambio de imagen de su perfil
    public function rules(){

        /// Llamamos al id del usuario que deseea hacer el cambio de imagen
        $userId = Auth::id();

        return [
            'foto_perfil'=>'required',
        ];
    }
}

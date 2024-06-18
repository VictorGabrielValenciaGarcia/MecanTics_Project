<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'primer_ap',
        'segundo_ap',
        'correo_inst',
        'correo_personal',
        'carrera',
        'grupo',
        'username',
        'password',
        'puntos',
        'matricula',
        'foto_perfil',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ 
        
        'email_verified_at' => 'datetime',
    ];

    /// Encriptamos la contraseña
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }


    /// Asignamos los valores que identitficaran al tipo de usuario para el registro
    public function setTipoAttribute($value) {
        switch ($value) {
            case 2:
                $this->attributes['tipo'] = 'CENTRO DE CANJEO';
                break;
            case 3:
                $this->attributes['tipo'] = 'ADMINISTRADOR';
                break;
            default: //1
                $this->attributes['tipo'] = 'USUARIO';
        }
    }    

    
}

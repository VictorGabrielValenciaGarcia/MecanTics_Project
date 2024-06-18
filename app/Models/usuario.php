<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;
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
        'matricula'
    ];
}

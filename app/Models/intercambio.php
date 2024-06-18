<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intercambio extends Model
{
    use HasFactory;
    protected $fillable = [

        'id_usuario',
        'id_centrocanjeo',
        'id_producto',
        'puntos_descontados',
        'fecha',
        'estado'

    ];

}
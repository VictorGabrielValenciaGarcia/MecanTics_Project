<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lata extends Model
{
    use HasFactory;
    protected $fillable = [
     
        'fecha',
        'cant_latas',
        'usuarios_idusuario'

    ];

}

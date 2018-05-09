<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nuestra extends Authenticatable
{  
    protected $table = "nuestra_empresa";
    protected $fillable = [
        'titulo_es', 'contenido_en', 'titulo_en', 'contenido_es', 'titulo_pt','contenido_pt', 'imagen', 'imagen_cabecera'
    ];
}

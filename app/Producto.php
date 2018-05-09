<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Producto extends Authenticatable
{  
    protected $table = "productos";
    protected $fillable = [
        'nombre_es', 'nombre_en', 'nombre_pt', 'imagen', 'orden', 'link', 'subtitulo_es', 'subtitulo_en', 'subtitulo_pt'
    ];
}

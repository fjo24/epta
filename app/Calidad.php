<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Calidad extends Authenticatable
{  
    protected $table = "calidades";
    protected $fillable = [
        'ficha_es', 'ficha_en', 'ficha_pt', 'nombre_es', 'nombre_pt', 'nombre_en', 'orden', 'icono1', 'icono2', 'titulo_es', 'titulo_pt', 'titulo_en', 'contenido_es', 'contenido_pt', 'contenido_en', 'imagen'
    ];
}

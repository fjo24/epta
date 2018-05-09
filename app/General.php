<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class General extends Authenticatable
{  
    protected $table = "generales";
    protected $fillable = [
        'id_subfamilias', 'tabla', 'nombre_es', 'nombre_en', 'nombre_pt', 'contenido_es', 'contenido_en', 'contenido_pt', 'imagen_destacada', 'descarga_es', 'descarga_en', 'descarga_pt', 'codigo1', 'codigo2', 'solucion_es', 'solucion_en', 'solucion_pt', 'orden'
    ];
}

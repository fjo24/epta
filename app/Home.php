<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Home extends Authenticatable
{  
    protected $table = "homes";
    protected $fillable = [
        'titulo_es', 'titulo_en', 'titulo_pt', 'subtitulo_es', 'subtitulo_en', 'subtitulo_pt', 'contenido_es',  'contenido_en', 'contenido_pt', 'link'
    ];
}

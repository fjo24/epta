<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mision extends Authenticatable
{  
    protected $table = "misiones";
    protected $fillable = [
        'titulo_es', 'titulo_en', 'titulo_pt', 'contenido_es', 'contenido_pt', 'contenido_en', 'imagen'
    ];
}

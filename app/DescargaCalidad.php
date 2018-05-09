<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DescargaCalidad extends Authenticatable
{  
    protected $table = "descargas_calidades";
    protected $fillable = [
        'ficha_es', 'ficha_en', 'ficha_pt', 'nombre_es', 'nombre_pt', 'nombre_en', 'orden'
    ];
}

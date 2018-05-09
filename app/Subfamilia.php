<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subfamilia extends Authenticatable
{  
    protected $table = "subfamilias";
    protected $fillable = [
        'nombre_es', 'nombre_en', 'nombre_pt', 'id_familia', 'orden'
    ];
}

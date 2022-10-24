<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoUno extends Model
{
    use HasFactory;
    protected $fillable = [
        'accion',
        'objeto',
        'localizacion',
        'fecha_ejecucion',
        'completos_id',
    ];
}

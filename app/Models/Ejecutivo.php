<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'resumen',
        'objetivo',
        'conclusion',
        'linea_investigacions_id',
        'personals_id',
        'laboratorios_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completo extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'meses',
        'impacto',
        'objetivo_general',
        'linea_investigacions_id',
        'personals_id',
        'laboratorios_id',
    ];
}

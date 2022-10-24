<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDos extends Model
{
    use HasFactory;
    protected $fillable = [
        'antecedente',
        'resumen',
        'justificacion',
        'completos_id',
    ];
}

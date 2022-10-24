<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSeis extends Model
{
    use HasFactory;
    protected $fillable = [
        'recomendacion',
        'completos_id',
    ];
}

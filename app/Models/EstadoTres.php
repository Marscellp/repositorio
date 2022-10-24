<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTres extends Model
{
    use HasFactory;
    protected $fillable = [
        'identificacion',
        'formulacion',
        'metodologia',
        'completos_id',
    ];
}

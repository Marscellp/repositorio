<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSiete extends Model
{
    use HasFactory;
    protected $fillable = [
        'conclusion',
        'completos_id',
    ];
}

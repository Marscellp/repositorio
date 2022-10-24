<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCinco extends Model
{
    use HasFactory;
    protected $fillable = [
        'objetivo_especifico',
        'completos_id',
    ];
}

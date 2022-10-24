<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'marco',
        'resultado',
        'matriz',
        'actividad',
        'plan',
        'presupuesto',
        'bien',
        'procedimiento',
        'completos_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;
    protected $fillable = [
        'laboratorio',
        'descripcion',
        'user_id',
    ];
    //RELACION UNO A MUCHOS
    public function personals(){
        return $this->hasMany(Personal::class);
    }

    //RELACION UNO A MUCHOS
    public function diarios(){
        return $this->hasMany(Diario::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'area',
        'linea_investigacion',
        'descripcion',
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

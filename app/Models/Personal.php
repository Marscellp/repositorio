<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'firma',
        'horario',
        'user_id',
        'linea_investigacions_id',
        'laboratorios_id',
    ];
    //RELACION UNO A MUCHOS INVERSA
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function laboratorios(){
        return $this->belongsTo(Laboratorio::class);
    }
    public function linea_investigacions(){
        return $this->belongsTo(LineaInvestigacion::class);
    }

    //RELACION UNO A MUCHOS
    public function diarios(){
        return $this->hasMany(Diario::class);
    }
}

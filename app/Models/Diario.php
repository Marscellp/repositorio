<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'resumen',
        'procedimiento',
        'observacion',
        'linea_investigacions_id',
        'personals_id',
        'laboratorios_id',
    ];
    //RELACION UNO A MUCHOS INVERSA
    public function personals(){
        return $this->belongsTo(Personal::class);
    }
    public function laboratorios(){
        return $this->belongsTo(Laboratorio::class);
    }
    public function linea_investigacions(){
        return $this->belongsTo(LineaInvestigacion::class);
    }
}

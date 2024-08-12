<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;


    protected $fillable = [

        'periodo',
        'sem_tri',
        'tipo',
        'other_inc',
        'date_ini',
        'date_end',
        'tutor_id',
        'estudiante_id',
        'carrera_id',
        'empresa_id',
        'serv_time'
    ];


    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

}

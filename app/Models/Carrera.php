<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'code'
    ];


    public function estudiantes(){

        return $this->hasMany(Estudiante::class);
    }


    public function tutores(){

        return $this->hasMany(Tutor::class);
    }
    
    public function expedientes(){

        return $this->hasMany(Expediente::class);
    }
    
}

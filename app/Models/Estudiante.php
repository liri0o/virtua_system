<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;


    protected $fillable = [

        'user_id',
        'carrera_id',
        'tlf',
        'edad',
        'direccion'
        
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    public function expediente()
    {
        return $this->hasOne(Expediente::class);
    }   
    public function user(){
        return $this->belongsTo(User::class);
    }
}

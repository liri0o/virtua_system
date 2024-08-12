<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public function empresario(){

        return $this->hasOne(Empresario::class);
    }

    public function expedientes(){

        return $this->hasMany(Expediente::class);
    }

    protected $fillable = [
        'name',
        'description',
        'direccion',
        'tlf_1',
        'tlf_2',
        'email',       
        'photo',       
    ];

}


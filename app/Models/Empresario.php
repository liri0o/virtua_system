<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresario extends Model
{
    use HasFactory;


    protected $fillable = [
        'empresa_id',
        'user_id',      
        'tlf',
        'edad',
        'direccion',
        'cargo',
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
    
    public function empresa(){

        return $this->belongsTo(Empresa::class);
    } 
}

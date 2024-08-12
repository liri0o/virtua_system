<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'expediente_id'    
    ];

    public function expediente(){
        return $this->belongsTo(Expediente::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    // N:1
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    // N:M
    public function aulas()
    {
        return $this->belongsToMany(Aula::class);
    }
    // N:M
    public function personas()
    {
        return $this->belongsToMany(Persona::class);
    }

}

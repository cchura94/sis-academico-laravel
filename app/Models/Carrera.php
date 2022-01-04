<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    // carreras
    // wp_carrera
    // protected $table = "wp_carrera";
    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}

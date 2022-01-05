<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class)->withPivot("periodo_id", "nota");
    }
}

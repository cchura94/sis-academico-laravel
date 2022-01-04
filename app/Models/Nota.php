<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    
    protected $table = "wp_nota";

    protected $primaryKey = 'cod_nota';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;
}

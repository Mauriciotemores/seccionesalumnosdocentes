<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cedula'];

    public function secciones()
    {
        return $this->belongsToMany(Seccion::class);
    }
}
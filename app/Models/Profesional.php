<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $fillable = ['nombre', 'cedula', 'registro', 'profesion', 'titulo', 'universidad', 'fecha_registro'];
}
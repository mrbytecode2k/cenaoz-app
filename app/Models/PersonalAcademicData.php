<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAcademicData extends Model
{
    use HasFactory;

    
protected $fillable = [
    'nombres', 'apellidos', 'lugar_nac','fecha_nacimiento', 'cedula', 'nro_telefonico', 'file_cedula',
    'profesion', 'file_titulo', 'file_registro_prof', 'file_cert_ozono', 'file_notas_ozono', 'file_pensum','email','universidad','fecha_e','qrcode'
];


}

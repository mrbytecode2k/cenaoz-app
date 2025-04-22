<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'cedula',
        'nro_telefonico',
        'file_cedula',
        'file_titulo',
        'file_registro_prof',
        'file_cert_ozono',
        'file_notas_ozono',
        'file_pensum',
        'profesion',
    ];

 /**
     * Reglas de validación.
     */
    public static function rules()
    {
        return [
            'nombres' => 'required|max:100',
            'apellidos' => 'nullable|max:100',
            'fecha_nacimiento' => 'required|date_format:d/m/Y',
            'cedula' => 'required|integer|unique:usuarios',
            'nro_telefonico' => 'required|regex:/^02\d{2}-\d{7}$/',
            'file_cedula' => 'required|mimes:jpg,png,pdf|max:2048',
            'file_titulo' => 'nullable|mimes:jpg,pdf,doc|max:2048',
            'file_registro_prof' => 'nullable|mimes:jpg,pdf,doc|max:2048',
            'file_cert_ozono' => 'nullable|mimes:jpg,pdf,doc|max:2048',
            'file_notas_ozono' => 'nullable|mimes:jpg,pdf,doc|max:2048',
            'file_pensum' => 'nullable|mimes:jpg,pdf,doc|max:2048',
            'profesion' => 'required|in:Medico Cirujano,Licenciado en enfermeria,TSU en enfermeria,Licenciatura en Fisioterapia,Odontología,Medicina Veterinaria',

        ];
    }

    /**
     * Guardar archivos subidos con un nombre basado en la cédula y el nombre.
     */
    public static function uploadFiles($request, $usuario)
    {
        if ($request->hasFile('file_cedula')) {
            $usuario->file_cedula = $request->file('file_cedula')->storeAs(
                'cedulas', $request->cedula . '_' . $request->nombres . '.' . $request->file('file_cedula')->extension()
            );
        }

        if ($request->hasFile('file_titulo')) {
            $usuario->file_titulo = $request->file('file_titulo')->store('titulos');
        }

        if ($request->hasFile('file_registro_prof')) {
            $usuario->file_registro_prof = $request->file('file_registro_prof')->store('registros_profesionales');
        }

        if ($request->hasFile('file_cert_ozono')) {
            $usuario->file_cert_ozono = $request->file('file_cert_ozono')->store('certificados_ozono');
        }

        if ($request->hasFile('file_notas_ozono')) {
            $usuario->file_notas_ozono = $request->file('file_notas_ozono')->store('notas_ozono');
        }

        if ($request->hasFile('file_pensum')) {
            $usuario->file_pensum = $request->file('file_pensum')->store('pensum');
        }
    }
    
}

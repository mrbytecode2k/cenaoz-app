<?php

namespace App\Http\Controllers;
use App\Models\PersonalAcademicData;
use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class PersonalAcademicDataController extends Controller
{
    // Muestra el formulario de datos personales
    public function showPersonalForm(Request $request)
    {
 

       // if ($this->findReg($request->user()->email)){
            //return $request->user()->email;
        //    return redirect()->route('dashboard')->with("info", "Ya posee un registro en el sistema! No es posible crear múltiples registros.");
      //  }else
       //    {
            return view('forms.personal');  // Redirige a la vista personal.blade.php
      //  }
     //   return view('forms.personal');  // Redirige a la vista personal.blade.php

    }

    // Guarda los datos personales en la sesión
    public function storePersonal(Request $request)
    {
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'nullable|string|max:100',
            'lugar_nac' => 'nullable|string|max:300',
            'fecha_nacimiento' => 'required|date_format:d/m/Y',
            'cedula' => 'required|integer|unique:personal_academic_data',
            'nro_telefonico' => 'required|string|regex:/^02\d{2}-\d{7}$/',
            'file_cedula' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'email' => 'nullable|string|max:300',
            
            
        ]);

        // Guardar archivo de la cédula
        if ($request->hasFile('file_cedula')) {
            $validatedData['file_cedula'] = $request->file('file_cedula')->store('cedulas', 'public');
        }

        // Guardar datos personales en la sesión
        session(['personal_data' => $validatedData]);

        // Redirigir al formulario de datos académicos
        return redirect()->route('formacion.show'); // Asegúrate de que esta ruta esté definida
    }

    // Muestra el formulario de datos académicos
    public function showAcademicForm()
    {
        // Recupera los datos personales de la sesión
        $personalData = session('personal_data');
        return view('forms.academic', ['personalData' => (object)$personalData]); // Pasamos a la vista
    }

    // Guarda los datos académicos y los combina con los datos personales
    public function storeAcademic(Request $request)
    {


       /* $validatedData = $request->validate([
            'profesion' => 'nullable|in:Medico Cirujano,Licenciado en enfermeria,TSU en enfermeria,Licenciatura en Fisioterapia,Odontología,Medicina Veterinaria',
            'file_titulo' => 'nullable|file|mimes:jpg,pdf,doc|max:2048',
            'file_registro_prof' => 'nullable|file|mimes:jpg,pdf,doc|max:2048',
            'file_cert_ozono' => 'nullable|file|mimes:jpg,pdf,doc|max:2048',
            'file_notas_ozono' => 'nullable|file|mimes:jpg,pdf,doc|max:2048',
            'file_pensum' => 'nullable|file|mimes:jpg,pdf,doc|max:2048',
        ]);*/

        // Guardar archivos académicos
        $validatedData['profesion'] = $request->input('profesion');
        $validatedData['universidad'] = $request->input('universidad');
        $validatedData['fecha_e'] = $request->input('fecha_e');


        if ($request->hasFile('file_titulo')) {
            $validatedData['file_titulo'] = $request->file('file_titulo')->store('titulos', 'public');
        }
        if ($request->hasFile('file_registro_prof')) {
            $validatedData['file_registro_prof'] = $request->file('file_registro_prof')->store('registro_prof', 'public');
        }
        if ($request->hasFile('file_cert_ozono')) {
            $validatedData['file_cert_ozono'] = $request->file('file_cert_ozono')->store('certificados_ozono', 'public');
        }
        if ($request->hasFile('file_notas_ozono')) {
            $validatedData['file_notas_ozono'] = $request->file('file_notas_ozono')->store('notas_ozono', 'public');
        }
        if ($request->hasFile('file_pensum')) {
            $validatedData['file_pensum'] = $request->file('file_pensum')->store('pensum', 'public');
        }

        // Combinar datos personales y académicos   
        $personalData = session('personal_data', []);
        $allData = array_merge($personalData, $validatedData);
        // Guardar todos los datos en la base de datos

        PersonalAcademicData::create($allData);
        $recipient=$allData['email'];
        Mail::to($recipient)->send(new ContactMailable( $allData['nombres'].' '.$allData['apellidos']) );

        // Limpiar la sesión
        session()->forget('personal_data');
        // Redirigir a una página de éxito o donde prefieras
        return redirect()->route('dashboard')->with('success', 'Datos guardados correctamente.');
  
    }


   
    public function validateQr($qrcode)
    {
       
        $profesional = PersonalAcademicData::where('qrcode',$qrcode)->first();

        if ($profesional == null)
          {
             echo "no encontrado";

          }else
          {
            dd($profesional);

          }
        //return redirect('/items')->with('success', 'Item updated successfully');
    }


    public function findReg($email)
    {

        
        $profesional = PersonalAcademicData::where('email',$email)->first();

        if ($profesional == null)
          {
             return false;

          }else
          {
           return true;

          }
        //return redirect('/items')->with('success', 'Item updated successfully');
    }





}





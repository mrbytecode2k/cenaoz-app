<?php 

namespace App\Http\Controllers;
use PDF;
use App\Models\PersonalAcademicData;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use  GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;



class CertificadoController extends Controller
{


public function getSacs($cedula)
{
    $client = new Client();

    try {
    $response = $client->request('POST', 'https://sistemas.sacs.gob.ve/consultas/prfsnal_salud', [
        'headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ],
        'form_params' => [
            'xajax' => 'getPrfsnalByCed',
            'xajaxr' => '1733828128002',
            'xajaxargs[]' => $cedula
        ]
    ]);

    $body = $response->getBody();
    $contents = $body->getContents();

    }
    catch (RequestException $e) {
        return $e->curl_errno;   
   
    }

    
    
}

    public function generarCertificado($id)
    {
        $profesional = PersonalAcademicData::findOrFail($id);

        // Validación básica
        if (!$profesional->nombres || !$profesional->apellidos || !$profesional->cedula) {
            return redirect()->back()->with('error', 'Datos del profesional incompletos.');
        }
        $image = base64_encode(file_get_contents(public_path('/images/top.png')));
        $fullName = $profesional->nombres.$profesional->apellidos;

        $hashedName = hash('sha256', $fullName);
        $url="http://localhost:8000/hash/validate/?qr=".urlencode($hashedName);
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($url));
        //$sacs = $this->getSacs($profesional->cedula);

        $data = [
            'email' => $profesional->email,
            'title'=> 'From noresponder@cenaoz.gob.ve',
            'qrcode' => $qrcode,
            'id'=> $profesional->id,
            'image'=> $image,
            'profesional'=> $profesional,

        ]; 
       

        $pdf = PDF::loadView('forms.certificado', [
            'director' => 'PATRICIA BEATRIZ VITO GRANADO',
            'profesional' => $profesional,
            'image' => $image,
            //'sacs'=> $sacs,
            
        ],$data,)
        ->setPaper('a4', 'portrait')
        ->setOptions([
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true, // Habilita el uso de fuentes externas
        ]);
    
        Mail::send('', $data, function($message)use($data, $pdf) {
            $message->to($data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), 'certificado_'.$data["id"].'.pdf');
        });
       // Mail::to($profesional->email)->send('forms.certificado')->attac;

        $this->update($profesional->id,urlencode($hashedName));

        
        //return $pdf->download('certificado_'.$profesional->id.'.pdf');
    }


    public function update( $id,$qrcode)
    {
        $profesional = PersonalAcademicData::findOrFail($id);
        $profesional->qrcode = $qrcode;
        $profesional->save();
        //return redirect('/items')->with('success', 'Item updated successfully');
    }
}
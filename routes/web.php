<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalAcademicDataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertificadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', 'login');



Route::get('/lg', function () {
    return view('lg');
});


//Route::get('/hash/validate/{qr}',[App\Http\Controllers\PersonalAcademicDataController::class, 'validateQr']);


// Ruta para mostrar el formulario de datos personales
Route::get('/personal', [PersonalAcademicDataController::class, 'showPersonalForm'])->name('personal.show');

//Route::get('/qr', [App\Http\Controllers\QrcodeController::class, 'index'])->name('prueba');


// Ruta para guardar los datos personales
Route::post('/personal', [PersonalAcademicDataController::class, 'storePersonal'])->name('personal.store');

// Ruta para mostrar el formulario de datos académicos
//Route::get('/formacion/{id}', [PersonalAcademicDataController::class, 'showAcademicForm'])->name('formacion.show');

// Ruta para guardar los datos académicos
Route::get('/formacion', [PersonalAcademicDataController::class, 'showAcademicForm'])->name('formacion.show');
Route::post('/formacion', [PersonalAcademicDataController::class, 'storeAcademic'])->name('academic.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/certificado/{id}', [App\Http\Controllers\CertificadoController::class, 'generarCertificado']);
/*Route::get('/certificado/{id}', [
    'middleware' => 'checkCertificatePermission',
    'uses' => 'App\Http\Controllers\CertificadoController@generarCertificado'
]);*/

//admin dashboard   

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/search', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/show/{id}', [AdminController::class, 'show'])->name('admin.show');
   

});


Route::prefix('certificado')->group(function () {
    Route::get('/certificado/{id}',  [CertificadoController::class, 'generarCertificado'])->name('forms.certificado');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () 
    {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Grupo de rutas protegidas
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Rutas de datos personales
    Route::get('/personal', [PersonalAcademicDataController::class, 'showPersonalForm'])->name('personal.show');
    Route::post('/personal', [PersonalAcademicDataController::class, 'storePersonal'])->name('personal.store');
    
    // Rutas de formación académica
    Route::get('/formacion', [PersonalAcademicDataController::class, 'showAcademicForm'])->name('formacion.show');
    Route::post('/formacion', [PersonalAcademicDataController::class, 'storeAcademic'])->name('academic.store');
});
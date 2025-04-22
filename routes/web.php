<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalAcademicDataController;
use App\Http\Controllers\AdminController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para mostrar el formulario de datos personales
Route::get('/personal', [PersonalAcademicDataController::class, 'showPersonalForm'])->name('personal.show');

// Ruta para guardar los datos personales
Route::post('/personal', [PersonalAcademicDataController::class, 'storePersonal'])->name('personal.store');

// Ruta para mostrar el formulario de datos académicos
//Route::get('/formacion/{id}', [PersonalAcademicDataController::class, 'showAcademicForm'])->name('formacion.show');

// Ruta para guardar los datos académicos
Route::get('/formacion', [PersonalAcademicDataController::class, 'showAcademicForm'])->name('formacion.show');
Route::post('/formacion', [PersonalAcademicDataController::class, 'storeAcademic'])->name('academic.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin dashboard

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/search', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/show/{id}', [AdminController::class, 'show'])->name('admin.show');
});

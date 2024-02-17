<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/asistencias', [AsistenciaController::class,'index'] );

Route::post('/registrar-asistencia', [AsistenciaController::class, 'registrarAsistencia'])->name('registrar.asistencia');

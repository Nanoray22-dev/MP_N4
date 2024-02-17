<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//docentes

Route::get('/docente',[ DocenteController::class, 'index']);
Route::post('/docente', [DocenteController::class, 'store']);
Route::get('/docente/{id}', [DocenteController::class,'show']);
Route::put('/docente/{id}', [DocenteController::class, 'update']);
Route::delete('/docente/{id}', [DocenteController::class, 'destroy']);

Route::get('/alumno',[ AlumnoController::class, 'index']);
Route::post('/alumno', [AlumnoController::class, 'store']);
Route::get('/alumno/{id}', [AlumnoController::class,'show']);
Route::put('/alumno/{id}', [AlumnoController::class, 'update']);
Route::delete('/alumno/{id}', [AlumnoController::class, 'destroy']);

Route::get('/curso',[ CursoController::class, 'index']);
Route::post('/curso', [CursoController::class, 'store']);
Route::get('/curso/{id}', [CursoController::class,'show']);
Route::put('/curso/{id}', [CursoController::class, 'update']);
Route::delete('/curso/{id}', [CursoController::class, 'destroy']);

Route::post('/alumnos/{alumnoId}/cursos/{cursoId}/enroll', [AlumnoController::class, 'enrollInCourse']);
Route::get('/alumnos/{alumnoId}/cursos/{cursoId}/enrollment', [AlumnoController::class, 'checkEnrollment']);




Route::post('/asistencias', [AsistenciaController::class, 'store']);
Route::get('/asistencias', [AsistenciaController::class,'index'] );











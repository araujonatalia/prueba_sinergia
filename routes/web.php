<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/List-paciente/',  [App\Http\Controllers\HomeController::class, 'listPaciente']);
Route::get('/create-paciente',  [App\Http\Controllers\PacienteController::class, 'btnView']); //'Controllers\PacienteController@btnView');
Route::get('/select-change/{id}',[App\Http\Controllers\PacienteController::class, 'changeSelect']);
Route::post('/prueba-createpaciente', [App\Http\Controllers\PacienteController::class, 'store']);
Route::post('/prueba-editpaciente', [App\Http\Controllers\PacienteController::class, 'edit'])->name('paciente.edit');
Route::post('/prueba-delete', [App\Http\Controllers\PacienteController::class, 'deletePaciente'])->name('paciente.Destroy');
Route::get('/paciente/{id}',[App\Http\Controllers\PacienteController::class, 'pacienteId']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

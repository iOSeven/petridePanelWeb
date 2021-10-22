<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SolicitudesController;
use App\Http\Controllers\Admin\UsuariosController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/solicitudes', [HomeController::class, 'solicitudes']);
Route::get('/usuarios', [HomeController::class, 'usuarios']);
Route::get('/configuracion', [HomeController::class, 'configuracion']);
Route::get('/config/transporte', [HomeController::class, 'configuracion_transporte']);

//Solicitudes
Route::resource('/solicitudes', App\Http\Controllers\Admin\SolicitudesController::class);

//Usuarios
Route::resource('/usuarios', App\Http\Controllers\Admin\UsuariosController::class);



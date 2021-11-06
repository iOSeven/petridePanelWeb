<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SolicitudesController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\FacturacionController;
use App\Http\Controllers\Admin\SocioRiderController;
use App\Http\Controllers\BillingController;


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

//Facturacion
Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
Route::post('/paymentmethod', [BillingController::class, 'paymentmethod'])->name('paymentmethod.create');
Route::post('/deletepaymentmethod/{id}', [BillingController::class, 'deletepaymentmethod'])->name('paymentmethod.delete');
Route::post('/defaultpaymentmethod/{id}', [BillingController::class, 'defaultpaymentmethod'])->name('paymentmethod.default');

Route::get('/products/pay', [BillingController::class, 'pay'])->name('products.pay');
Route::post('/paysingle', [BillingController::class, 'paysingle'])->name('paysingle.create');

//Usuarios
Route::resource('/usuarios', App\Http\Controllers\Admin\UsuariosController::class);
Route::put('/update_transportadora/{id}', [App\Http\Controllers\Admin\SocioRiderController::class, 'update_transportadora'])->name('complementos.update_transportadora');
Route::resource('/complementos', App\Http\Controllers\Admin\SocioRiderController::class);

//Facturacion
Route::resource('/facturas', App\Http\Controllers\Admin\FacturacionController::class);
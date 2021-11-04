<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AccessApiController;
use App\Http\Controllers\Api\ChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/checklogin/{u}/{p}', [AccessApiController::class, 'checklogin']);
Route::get('/adduser/{n}/{l1}/{l2}/{e}/{p}/{r}', [AccessApiController::class, 'adduser']);

//Caht
Route::get('/addmessaje/{f}/{t}/{m}', [ChatController::class, 'saveMessage']);
//Route::middleware('auth:api')->get('/checklogin/{u}/{p}', 'ApiController\LoginApiController@checklogin');
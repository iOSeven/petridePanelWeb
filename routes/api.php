<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AccessApiController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\CoordenadasRiderController;
use App\Http\Controllers\Api\PetController;
use App\Http\Controllers\Api\TravelModelController;

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

//Auth Users
Route::get('/checklogin/{u}/{p}', [AccessApiController::class, 'checklogin']);
Route::get('/authUser/{id}', [AccessApiController::class, 'authUser']);

//Users Functions
Route::get('/adduser/{n}/{l1}/{l2}/{e}/{p}/{r}', [AccessApiController::class, 'adduser']);

//Chat
Route::get('/addmessaje/{f}/{t}/{m}', [ChatController::class, 'saveMessage']);
//Route::middleware('auth:api')->get('/checklogin/{u}/{p}', 'ApiController\LoginApiController@checklogin');

//Rider

//Guardar Latitud Logintud
Route::get('/addcurrentlocation/{i}/{la}/{lo}', [CoordenadasRiderController::class, 'addCoordenadas']);
Route::get('/newtravel/{u}/{r}/{las}/{los}/{lae}/{loe}/{d}/{h}/{i}/{f}', [TravelModelController::class, 'newTravel']);
Route::get('/mytravels/{u}/{ds}/{de}', [TravelModelController::class, 'myTravels']);
Route::get('/mylasttravels/{u}', [TravelModelController::class, 'myLastTravels']);

//Pets
Route::get('/addnewpet/{u}/{r}/{s}/{t}', [PetController::class, 'saveNewPet']);
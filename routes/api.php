<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    //Routes for Auth...
//Route::post('/login',[AuthController::class,'login']);
//Route::post('/Regester',[AuthController::class,'regester']);
//Route::post('/logout',[AuthController::class,'logout']);
    //Route for Tasks...
//Route::resource('/tasks', TaskController::class);


//Protected Route..
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::resource('/tasks', TaskController::class);
    Route::post('/logout',[AuthController::class,'logout']);

});
//Public Routs..
Route::post('/login',[AuthController::class,'login']);
Route::post('/Regester',[AuthController::class,'regester']);

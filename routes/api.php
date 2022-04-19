<?php

use App\Http\Controllers\Todocontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;

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

Route::get('/show',[Todocontroller::class,'show']);
Route::post('/create',[Todocontroller::class,'create']);
Route::put('todo/{id}',[Todocontroller::class,'update']);
Route::post('todo_delete',[Todocontroller::class,'destroy']);

Route::group(
    ['middleware'=>'api'], function ($router){
    Route::post('/register',[JWTController::class,'register']);
    Route::post('/login',[JWTController::class,'login']);
    Route::post('/logout',[JWTController::class,'logout']);
    Route::post('/profile',[JWTController::class,'profile']);
    Route::post('/refresh',[JWTController::class,'refresh']);
});


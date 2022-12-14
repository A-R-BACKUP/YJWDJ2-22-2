<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/publishers', [App\Http\Controllers\PublisherAction::class, 'create']);
// POST /api/publishers 요청 처리

//Route::get('/users',App\Http\Controllers\UserAction::class);  // 라우팅

Route::group(
  ['middleware'=>'api'], 
  function($router){
    Route::post('/users/login','App\Http\Controllers\User\LoginAction');
    Route::post('/users', \App\Http\Controllers\User\RetrieveAction::class)->middleware('auth:jwt');
  }
);
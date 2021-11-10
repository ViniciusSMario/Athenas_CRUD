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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Open routes
Route::post('/login', 'UserController@authenticate');

//Closed Routes
Route::group(['middleware' => ['jwt.verify.adm']], function(){
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/{id}', 'CategoryController@show');
    Route::post('/categories', 'CategoryController@store');
    Route::put('/categories/{id}', 'CategoryController@update');
    Route::delete('/categories/{id}', 'CategoryController@destroy');

    Route::get('/persons', 'PersonController@index');
    Route::get('/persons/{id}', 'PersonController@show');
    Route::post('/persons', 'PersonController@store');
    Route::put('/persons/{id}', 'PersonController@update');
    Route::delete('/persons/{id}', 'PersonController@destroy');
});


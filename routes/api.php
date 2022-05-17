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
Route::put('/role/update/{id}', 'App\Http\Controllers\RoleController@update',);
Route::delete('/role/delete/{id}', 'App\Http\Controllers\RoleController@delete',);
Route::get('/role/find/{id}', 'App\Http\Controllers\RoleController@findById',);
Route::get('/role/get', 'App\Http\Controllers\RoleController@getAll',);
Route::put('/user/update/{id}', 'App\Http\Controllers\UserController@update',);
Route::get('/user/get', 'App\Http\Controllers\UserController@getAll',);
Route::post('/user/create', 'App\Http\Controllers\UserController@create',);
Route::get('/user/find/{id}', 'App\Http\Controllers\UserController@findById',);
Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@delete',);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});

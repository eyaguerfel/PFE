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

Route::get('/data', 'ProjectController@index');
Route::resource('projects', 'ProjectController');
Route::post('/project/create', 'App\Http\Controllers\ProjectController@create',);
Route::put('/project/update/{id}', 'App\Http\Controllers\ProjectController@update',);
Route::delete('/project/delete/{id}', 'App\Http\Controllers\ProjectController@delete',);
Route::get('/project/get_project_sd','App\Http\Controllers\ProjectController@get_all_projects_start_date',);
Route::get('/project/get_project_ed','App\Http\Controllers\ProjectController@get_all_projects_end_date',);
Route::get('/project/proj_h', 'App\Http\Controllers\ProjectController@proj_holidays',);
Route::get('/relholidays/get_rel','App\Http\Controllers\ReligiousHolidayController@get_religious_h',);
Route::get('/natholidays/get_nat','App\Http\Controllers\NationalHolidayController@get_national_h',);

Route::get('/task/get_mytask/{id}','App\Http\Controllers\TaskController@get_my_Task',);
Route::get('/proj/get_myproj/{id}','App\Http\Controllers\ProjectController@get_project',);
Route::get('/dash/proj_task/{id}', 'App\Http\Controllers\DashboardController@project_task',);


Route::get('/holiday/holid', 'App\Http\Controllers\DashboardController@holidays',);

Route::get('/calend/uc', 'App\Http\Controllers\DashboardController@user_calender',);


Route::get('/project/get_proj','App\Http\Controllers\ProjectController@get_project',);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});

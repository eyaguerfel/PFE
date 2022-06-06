<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NationalHolidayController;
use App\Http\Controllers\ReligiousHolidayController;
use App\Http\Controllers\ImageUploadController;

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
Route::get('/', function () {
    $user=App\Http\Controllers\UserController::get_connected_user();
        if (isset($user))
            return view('dashboard1');
        else
            return view('auth.login');
});
Route:: get("/users",[UserController::class,"allUser"])->name('userpage');
Route:: get("/users/create",[UserController::class,"create"])->name('usercreate');
Route:: post("/users/create",[UserController::class,"store"])->name('userstore');
Route:: get("/users/{user}",[UserController::class,"edit"])->name('useredit');
Route:: put("/users/{user}",[UserController::class,"update"])->name('userupdate');
Route:: delete("/users/{user}",[UserController::class,"delete"])->name('userdelete');

//Role
Route::get("/roles", [RoleController::class,"allRole"])->name('rolelist');
Route::get("/roles/create",[RoleController::class,"create"])->name('rolecreate');
Route:: delete("/roles/{role}",[RoleController::class,"delete"])->name('roledelete');

//Holidays
Route::get("/national", [NationalHolidayController::class,"allNationalHoliday"])->name('listnatholidays');
Route::get("/national/create",[NationalHolidayController::class,"create"])->name('createnatholidays');
Route:: post("/national/create",[NationalHolidayController::class,"store"])->name('storenatholidays');
Route:: get("/national/{nationalholiday}",[NationalHolidayController::class,"edit"])->name('natedit');
Route:: put("/national/{nationalholiday}",[NationalHolidayController::class,"update"])->name('natupdate');
Route:: delete("/national/{nationalholiday}",[NationalHolidayController::class,"delete"])->name('natdelet');


Route::get("/religioush", [ReligiousHolidayController::class,"allReligiousHoliday"])->name('listrelholidays');
Route::get("/religioush/create",[ReligiousHolidayController::class,"create"])->name('createrelholidays');
Route:: post("/religioush/create",[ReligiousHolidayController::class,"store"])->name('storerelholidays');
Route:: get("/religioush/{religiousholiday}",[ReligiousHolidayController::class,"edit"])->name('reledit');
Route:: put("/religioush/{religiousholiday}",[ReligiousHolidayController::class,"update"])->name('relupdate');
Route:: delete("/religioush/{religiousholiday}",[ReligiousHolidayController::class,"delete"])->name('reldelete');

//For adding an image
Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[ImageUploadController::class,'storeImage'])
->name('images.store');

//For showing an image
Route::get('/view-image',[ImageUploadController::class,'viewImage'])->name('images.view');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard1', function () {
    return view('dashboard1');
})->middleware(['auth'])->name('dashboard');

//Route::post('/role/create', 'App\Http\Controllers\RoleController@create',);


require __DIR__.'/auth.php';
Route::get('/login1', function()
{
    return view ('auth.login1');
} );
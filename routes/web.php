<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NationalHolidayController;
use App\Http\Controllers\ReligiousHolidayController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;



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

//[DashboardController::class,'index']
Route::get('/', [DashboardController::class,'redirect']);
Route:: get("/users",[UserController::class,"allUser"])->name('userpage');
Route:: get("/users/create",[UserController::class,"create"])->name('usercreate');
Route:: post("/users/create",[UserController::class,"store"])->name('userstore');
Route:: get("/users/{user}",[UserController::class,"edit"])->name('useredit');
Route:: put("/users/{user}",[UserController::class,"update"])->name('userupdate');
Route:: delete("/users/{user}",[UserController::class,"delete"])->name('userdelete');

//Role
Route::get("/roles", [RoleController::class,"allRole"])->name('rolelist');
Route::get("/roles/create",[RoleController::class,"create"])->name('rolecreate');
Route:: post("/roles/create",[RoleController::class,"store"])->name('rolestore');
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

//Project
Route:: get("/project",[ProjectController::class,"allProject"])->name('listproject');
Route:: get("/project/create",[ProjectController::class,"create"])->name('createproj');
Route:: post("/project/create",[ProjectController::class,"store"])->name('storeproject');
Route:: get("/project/{project}",[ProjectController::class,"edit"])->name('projectedit');
Route:: post("/project/{project}",[ProjectController::class,"update"])->name('updateproject');
Route:: delete("/project/{project}",[ProjectController::class,"delete"])->name('deleteproject');
Route:: get("/my_project",[ProjectController::class,"get_myProject"])->name('myproject');


//Tasks
Route::get("/task", [TaskController::class,"allTasks"])->name('listtask');
Route::get("/task/create",[TaskController::class,"create"])->name('createtask');
Route:: post("/task/create",[TaskController::class,"store"])->name('storetask');
Route:: get("/task/{task}",[TaskController::class,"edit"])->name('taskedit');
Route:: put("/task/{task}",[TaskController::class,"update"])->name('taskupdate');
Route:: delete("/task/{task}",[TaskController::class,"delete"])->name('deletetask');
Route:: get("/my_task",[TaskController::class,"my_task"])->name('mytask');

//calander for a normal user
Route::get("/user_calender", [DashboardController::class,'user_calender']);


//For adding an image
Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[ImageUploadController::class,'storeImage'])
->name('images.store');

//For showing an image
Route::get('/view-image',[ImageUploadController::class,'viewImage'])->name('images.view');


Route::get('/timesheet', function () {
    return view('scheduler');
});

Route::get('/dashboard',[DashboardController::class,'index'] )->middleware(['auth'])->name('dashboard');

Route::get('/dashboard1', function () {
    return view('dashboard1');
})->middleware(['auth'])->name('dashboard');

//Route::post('/role/create', 'App\Http\Controllers\RoleController@create',);


require __DIR__.'/auth.php';
Route::get('/login1', function()
{
    return view ('auth.login1');
} );
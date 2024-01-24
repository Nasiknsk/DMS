<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', function () {
    return view('welcome');
});
Route::get('addnew', function () {
    return view('newuser');
})->name('addnew');
Route::get('userview', function () {
    return view('userview');
})->name('userview');
Route::get('userupdate', function () {
    return view('updateuser');
})->name('userupdate');
// Route::get('task', function () {
//     return view('task');
// })->name('task');




// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/login',[App\Http\Controllers\loginController::class,'check'])->name('login');
Route::post('/users',[App\Http\Controllers\UserController::class,'insert'])->name('users');
Route::post('/addstaff',[App\Http\Controllers\UserController::class,'insert'])->name('addstaff');
Route::post('/updatetaff',[App\Http\Controllers\UserController::class,'updateStaff'])->name('updatestaff');
Route::get('/viewwuser',[App\Http\Controllers\UserController::class,'ShowUser'])->name('viewuser');
Route::get('/updateuser/{id}', [App\Http\Controllers\UserController::class,'updateUser'])->name('updateuser');
Route::get('/deleteuser/{id}', [App\Http\Controllers\UserController::class,'deleteUser'])->name('deleteuser');
Route::post('/newcat', [App\Http\Controllers\CategoryController::class, 'addCat'])->name('newcat');
Route::get('/addcat', [App\Http\Controllers\CategoryController::class, 'displayCat'])->name('addcat');
Route::get('/editcat/{id}', [App\Http\Controllers\CategoryController::class,'editCat'])->name('editcat');
Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class,'deleteCat'])->name('deletecat');
Route::post('/updatecat', [App\Http\Controllers\CategoryController::class, 'updateCat'])->name('updatecat');
Route::get('/task', [App\Http\Controllers\CategoryController::class, 'showCat'])->name('task');


// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/user', 'UserController@index')->name('user.dashboard');
    Route::get('/supervisor', 'SupervisorController@index')->name('supervisor.dashboard');
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

});
Route::post('/check-login', 'LoginController@check')->name('check.login');

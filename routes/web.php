<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Storage;

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
// Route::get('/dailyupdates', function () {
//     return view('dailyupdates');
// })->name('dailyupdates');

Route::get('addnew', function () {
    return view('newuser');
})->name('addnew');
Route::get('userview', function () {
    return view('userview');
})->name('userview');
Route::get('userupdate', function () {
    return view('updateuser');
})->name('userupdate');
Route::get('admindash', function () {
    return view('admindash');
})->name('admindash');
Route::get('superdash', function () {
    return view('superdash');
})->name('superdash');
Route::get('userdash', function () {
    return view('userdash');
})->name('userdash');
// Route::get('contacts', function () {
//     return view('contacts');
// })->name('contacts');




// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/login',[App\Http\Controllers\loginController::class,'check'])->name('login');
Route::post('/users',[App\Http\Controllers\UserController::class,'insert'])->name('users');
Route::post('/addstaff',[App\Http\Controllers\UserController::class,'insert'])->name('addstaff');
Route::post('/addtask',[App\Http\Controllers\TaskController::class,'addtask'])->name('addtask');
Route::post('/updatetask',[App\Http\Controllers\TaskController::class,'updatetask'])->name('updatetask');
Route::post('/addticket',[App\Http\Controllers\TicketController::class,'addticket'])->name('addticket');
Route::post('/submitticket',[App\Http\Controllers\TicketController::class,'submitticket'])->name('submitticket');
Route::post('/updateticket',[App\Http\Controllers\TicketController::class,'updateticket'])->name('updateticket');
Route::post('/updatework',[App\Http\Controllers\WorkController::class,'updatework'])->name('updatework');
Route::get('/viewworks/{id}',[App\Http\Controllers\WorkController::class,'viewworks'])->name('viewworks');
Route::get('/viewownwork/{id}',[App\Http\Controllers\WorkController::class,'viewownwork'])->name('viewownwork');
Route::post('/submitwork',[App\Http\Controllers\WorkController::class,'submitwork'])->name('submitwork');
Route::post('/updatetaff',[App\Http\Controllers\UserController::class,'updateStaff'])->name('updatestaff');
Route::get('/viewwuser',[App\Http\Controllers\UserController::class,'ShowUser'])->name('viewuser');
Route::get('/dailyupdates/{id}',[App\Http\Controllers\WorkController::class,'dailyupdates'])->name('dailyupdates');
Route::get('/dailyworks',[App\Http\Controllers\UserController::class,'dailyworks'])->name('dailyworks');
Route::get('/viewfull/{id}',[App\Http\Controllers\UserController::class,'ViewFull'])->name('viewfull');
Route::get('/updateuser/{id}', [App\Http\Controllers\UserController::class,'updateUser'])->name('updateuser');
Route::get('/deleteuser/{id}', [App\Http\Controllers\UserController::class,'deleteUser'])->name('deleteuser');
Route::post('/newcat', [App\Http\Controllers\CategoryController::class, 'addCat'])->name('newcat');
Route::get('/addcat', [App\Http\Controllers\CategoryController::class, 'displayCat'])->name('addcat');
Route::post('/addcontact', [App\Http\Controllers\ContactController::class, 'addContact'])->name('addcontact');
Route::get('/editcat/{id}', [App\Http\Controllers\CategoryController::class,'editCat'])->name('editcat');
Route::get('/editContact/{id}', [App\Http\Controllers\ContactController::class,'editContact'])->name('editContact');
Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class,'deleteCat'])->name('deletecat');
Route::get('/deleteContact/{id}', [App\Http\Controllers\ContactController::class,'deleteContact'])->name('deleteContact');
Route::post('/updatecat', [App\Http\Controllers\CategoryController::class, 'updateCat'])->name('updatecat');
Route::post('/updatecontact', [App\Http\Controllers\ContactController::class, 'updatecontact'])->name('updatecontact');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'showTask'])->name('task');
Route::get('/ticket', [App\Http\Controllers\TicketController::class, 'showTickets'])->name('ticket');
Route::get('/ticketsubmission', [App\Http\Controllers\TicketController::class, 'ticketsubmission'])->name('ticketsubmission');
Route::get('/viewTicket/{id}', [App\Http\Controllers\TicketController::class, 'viewTicket'])->name('viewTicket');
Route::get('/submitviewTicket/{id}', [App\Http\Controllers\TicketController::class, 'submitviewTicket'])->name('submitviewTicket');
Route::get('/remarkticket/{id}', [App\Http\Controllers\TicketController::class, 'remarkticket'])->name('remarkticket');
Route::get('/completeticket/{id}', [App\Http\Controllers\TicketController::class, 'completeticket'])->name('completeticket');
Route::get('/startticket/{id}', [App\Http\Controllers\TicketController::class, 'startticket'])->name('startticket');
Route::get('/submit/{id}', [App\Http\Controllers\TicketController::class, 'submit'])->name('submit');
Route::get('/editticket/{id}', [App\Http\Controllers\TicketController::class, 'editticket'])->name('editticket');
Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'ViewContact'])->name('contacts');
Route::get('/assign-task/{id}', [App\Http\Controllers\TaskController::class, 'assignTask'])->name('assign.task');
Route::get('/unassignTask/{id}', [App\Http\Controllers\TaskController::class, 'unassignTask'])->name('unassignTask');
Route::get('/taskticket/{id}', [App\Http\Controllers\TicketController::class, 'taskticket'])->name('taskticket');
Route::get('/completetask/{id}', [App\Http\Controllers\TicketController::class, 'completetask'])->name('completetask');
Route::post('/unassignedusers',[App\Http\Controllers\TicketController::class,'unassignedusers'])->name('unassignedusers');
Route::post('/addremark',[App\Http\Controllers\TicketController::class,'addremark'])->name('addremark');
Route::get('/edittask/{id}',[App\Http\Controllers\TaskController::class,'edittask'])->name('edittask');


// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/user', 'UserController@index')->name('user.dashboard');
    Route::get('/supervisor', 'SupervisorController@index')->name('supervisor.dashboard');
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

});
Route::post('/check-login', 'LoginController@check')->name('check.login');
Route::get('storage/app/task_files/{filename}', function ($filename) {
    $path = Storage::path('task_files/' . $filename);

    if (!Storage::exists('task_files/' . $filename)) {
        abort(404);
    }

    return response()->file($path);
})->where('filename', '.*');

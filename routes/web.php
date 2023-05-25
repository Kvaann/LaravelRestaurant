<?php

use Illuminate\Support\Facades\Route;

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
    return view('mainwindow');
});

// Route::get('/menu', [MenuController::class, 'index']);


// Route::get('/aboutus', [AboutController::class, 'index']);

Route:controller(ContactController:class->group(function (){
    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'send_email'])->name('sendEmail');
});


// Route::get('/gallery', [GalleryController::class, 'index']);

use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
Route::get('/', function () {
    return view('index');
});

Route:controller(LoginController:class->group(function (){
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('logUser');
});

Route:controller(RegisterController:class->group(function (){
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'AddUser'])->name('updateUser');
});

use App\Http\Controllers\LogoutController;
Route::get('/logout', [LogoutController::class, 'index'])->name('logoutUser');

use App\Http\Controllers\ReservationController;
Route::resource('reservation', ReservationController::class);



// use App\Http\Controllers\ContactController;
// Route::get('/contact', [ContactController::class, 'index']);
// Route::post('/contact', [ContactController::class, 'send_email'])->name('sendEmail');

// use App\Http\Controllers\LoginController;
// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'login'])->name('logUser');

// use App\Http\Controllers\RegisterController;
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'AddUser'])->name('updateUser');


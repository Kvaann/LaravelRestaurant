<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
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

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'send_email'])->name('sendEmail');
});

Route::controller(LoginController::class)->group(function (){
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('logUser');
});

Route::controller(RegisterController::class)->group(function (){
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', 'AddUser')->name('updateUser');
});

use App\Http\Controllers\LogoutController;
Route::get('/logout', [LogoutController::class, 'index'])->name('logoutUser');

use App\Http\Controllers\ReservationController;
Route::resource('reservation', ReservationController::class);

use App\Http\Controllers\UserController;
Route::get('/settings', [UserController::class, 'index']);
Route::post('/settings', [UserController::class, 'save'])->name('settingsUser');
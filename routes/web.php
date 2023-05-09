<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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


//route utilisateurs
Route::get('/', function () {
    return view('auth.login');
});




// route admin
Route::get('/home', function () {
    return view('admin.index');
});
Route::resource('user', UserController::class);
Route::resource('post', PostController::class);
Route::resource('city', CityController::class);
Route::get('/api/users', [UserController::class, 'getUsers']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

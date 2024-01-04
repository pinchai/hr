<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

//login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->name('login');

Route::post('/do_login', [App\Http\Controllers\LoginController::class, 'do_login'])
    ->name('do_login');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('master');
    });

    Route::get('/admin', function () {
        return view('master');
    });

    include 'admin/user.php';
});

//logout
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


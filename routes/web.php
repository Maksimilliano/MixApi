<?php

use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/login', [UserController::class, 'create'])->name('register.create');
Route::post('/login', [UserController::class, 'store'])->name('register.store');

Route::group(['middleware' => 'web'], function () {
    Route::get('app', function() {
        return view('vue_app');
    })->where('any', '.*');
});
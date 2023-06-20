<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/hello-laravel', function () {
    return view('hello-laravel');
});

Route::get('/hello-world', function () {
    return view('hello-world');
})->name('hello-world');

Auth::routes();



Route::middleware('auth')->group(function(){
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'show'])->name('profile');

    // Permohonan
    Route::get('/mohon/index', [App\Http\Controllers\MohonController::class, 'index'])->name('mohon.index');
    
});
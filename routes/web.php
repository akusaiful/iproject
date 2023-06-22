<?php

use App\Http\Controllers\MesyuaratController;
use App\Http\Controllers\MohonController;
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
    Route::get('/mohon', [MohonController::class, 'index'])->name('mohon.index');
    Route::get('/mohon/create', [MohonController::class, 'create'])->name('mohon.create');
    Route::post('/mohon/store', [MohonController::class, 'store'])->name('mohon.store');
    Route::get('/mohon/{mohon}', [MohonController::class, 'show'])->name('mohon.show');
    Route::get('/mohon/{mohon}/edit', [MohonController::class, 'edit'])->name('mohon.edit');
    Route::put('/mohon/{mohon}', [MohonController::class, 'update'])->name('mohon.update');
    Route::delete('/mohon/{mohon}', [MohonController::class, 'destroy'])->name('mohon.delete');    

    // Mesyuarat
    Route::group(['prefix' => 'mesyuarat'], function(){

        Route::get('/', [MesyuaratController::class, 'index'])->name('mesyuarat.index');
        Route::get('/{mesyuarat}/view', [MesyuaratController::class, 'show'])->name('mesyuarat.show');
        Route::get('/{mesyuarat}/edit', [MesyuaratController::class, 'edit'])->name('mesyuarat.edit');
        Route::put('/{mesyuarat}', [MesyuaratController::class, 'update'])->name('mesyuarat.update');
        Route::get('/{mesyuarat}', [MesyuaratController::class, 'destroy'])->name('mesyuarat.delete');    
    });
});
<?php

use App\Http\Controllers\JenisMesyuaratController;
use App\Http\Controllers\MesyuaratController;
use App\Http\Controllers\MohonController;
use App\Models\Mohon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'show'])->name('profile');

    // Permohonan
    Route::group(['prefix' => 'mohon', 'middleware' => ['role:admin-power|biasa']], function () {
        Route::get('/', [MohonController::class, 'index'])->name('mohon.index');
        Route::get('/{mohon}', [MohonController::class, 'show'])->name('mohon.show');
    });

    Route::group(['prefix' => 'mohon', 'middleware' => ['role:admin-power']], function () {
        Route::get('/create', [MohonController::class, 'create'])->name('mohon.create');
        Route::post('/store', [MohonController::class, 'store'])->name('mohon.store');
        Route::get('/{mohon}/edit', [MohonController::class, 'edit'])->name('mohon.edit');
        Route::put('/{mohon}', [MohonController::class, 'update'])->name('mohon.update');
        Route::delete('/{mohon}', [MohonController::class, 'destroy'])->name('mohon.delete');
    });

    // Mesyuarat
    Route::group(['prefix' => 'mesyuarat'], function () {

        Route::get('/', [MesyuaratController::class, 'index'])->name('mesyuarat.index');
        Route::get('/create', [MesyuaratController::class, 'create'])->name('mesyuarat.create');
        Route::post('/store', [MesyuaratController::class, 'store'])->name('mesyuarat.store');
        Route::get('/{mesyuarat}/view', [MesyuaratController::class, 'show'])->name('mesyuarat.show');
        Route::get('/{mesyuarat}/edit', [MesyuaratController::class, 'edit'])->name('mesyuarat.edit');
        Route::put('/{mesyuarat}', [MesyuaratController::class, 'update'])->name('mesyuarat.update');
        Route::get('/{mesyuarat}', [MesyuaratController::class, 'destroy'])->name('mesyuarat.delete');
    });

    // Jenis Mesyuarat
    Route::group(['prefix' => 'jenis-mesyuarat'], function () {

        Route::get('/', [JenisMesyuaratController::class, 'grid'])->name('jenis-mesyuarat.index');
        // Route::get('/create', [MesyuaratController::class, 'create'])->name('mesyuarat.create');
        // Route::post('/store', [MesyuaratController::class, 'store'])->name('mesyuarat.store');
        // Route::get('/{mesyuarat}/view', [MesyuaratController::class, 'show'])->name('mesyuarat.show');
        // Route::get('/{mesyuarat}/edit', [MesyuaratController::class, 'edit'])->name('mesyuarat.edit');
        // Route::put('/{mesyuarat}', [MesyuaratController::class, 'update'])->name('mesyuarat.update');
        // Route::get('/{mesyuarat}', [MesyuaratController::class, 'destroy'])->name('mesyuarat.delete');    
    });

    // Route::get('/file/{model}/download', function(Mohon $model){
    //     return Storage::download(Mohon::DOCUMENT_FOLDER . '/' . $model->file_dokumen_proses_semasa);
    // })->name('file.download');

    Route::get('/file/{model}/download', [MohonController::class, 'download'])->name('file.download');
});


Route::get('/hello-livewire', function () {
    //    return App\Models\SSO_TPengguna::with('tlogin.kod_level')->get();
    return App\Models\SSO_TPengguna::find(1)->with('tlogin.kod_level')->get();
});

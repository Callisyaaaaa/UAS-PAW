<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\Auth::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth::class, 'postlogin']);
Route::get('/logout', [App\Http\Controllers\Auth::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect('/stok');
    });

    Route::group(['prefix' => 'stok'], function () {
        Route::get('/', [App\Http\Controllers\StokGudangController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\StokGudangController::class, 'create']);
        Route::post('/add', [App\Http\Controllers\StokGudangController::class, 'store']);
        Route::get('/edit/{data}', [App\Http\Controllers\StokGudangController::class, 'edit']);
        Route::post('/edit/{data}', [App\Http\Controllers\StokGudangController::class, 'update']);
        Route::get('/delete/{data}', [App\Http\Controllers\StokGudangController::class, 'destroy']);
    });

    Route::group(['prefix' => 'barang_masuk'], function () {
        Route::get('/', [App\Http\Controllers\BarangMasukController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\BarangMasukController::class, 'create']);
        Route::post('/add', [App\Http\Controllers\BarangMasukController::class, 'store']);
        Route::get('/edit/{data}', [App\Http\Controllers\BarangMasukController::class, 'edit']);
        Route::post('/edit/{data}', [App\Http\Controllers\BarangMasukController::class, 'update']);
        Route::get('/delete/{data}', [App\Http\Controllers\BarangMasukController::class, 'destroy']);
    });

    Route::group(['prefix' => 'barang_keluar'], function () {
        Route::get('/', [App\Http\Controllers\BarangKeluarController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\BarangKeluarController::class, 'create']);
        Route::post('/add', [App\Http\Controllers\BarangKeluarController::class, 'store']);
        Route::get('/edit/{data}', [App\Http\Controllers\BarangKeluarController::class, 'edit']);
        Route::post('/edit/{data}', [App\Http\Controllers\BarangKeluarController::class, 'update']);
        Route::get('/delete/{data}', [App\Http\Controllers\BarangKeluarController::class, 'destroy']);
    });
});

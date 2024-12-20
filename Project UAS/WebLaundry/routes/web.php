<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;

// Halaman utama
Route::view('/', 'welcome')->name('welcome');

// Dashboard
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Semua rute yang membutuhkan autentikasi
Route::middleware(['auth', 'verified'])->group(function () {

    // Rute untuk Admin
    Route::middleware(['role:Admin'])->group(function () {
        // Rute Home Admin
        Route::get('/admin', [HomeController::class, 'adminHome'])->name('home.admin');

        // Rute Pembelian
        Route::prefix('pembelian')->name('pembelian.')->group(function () {
            Route::get('/', [PembelianController::class, 'index'])->name('index');
        
            Route::get('/create', [PembelianController::class, 'create'])->name('create');
        
            Route::post('/', [PembelianController::class, 'store'])->name('store');
        
            Route::get('/{id}', [PembelianController::class, 'show'])->name('show')->whereNumber('id');
        
            Route::get('/{id}/edit', [PembelianController::class, 'edit'])->name('edit')->whereNumber('id');
        
            Route::put('/{id}', [PembelianController::class, 'update'])->name('update')->whereNumber('id');
        
            Route::delete('/{id}', [PembelianController::class, 'destroy'])->name('destroy')->whereNumber('id');
        
            Route::get('/trashed', [PembelianController::class, 'trashed'])->name('trashed');
        
            Route::patch('/trashed/{id}/restore', [PembelianController::class, 'restore'])->name('restore')->whereNumber('id');
        
            Route::delete('/trashed/{id}/delete', [PembelianController::class, 'forceDelete'])->name('forceDelete')->whereNumber('id');
        });
        

        // Rute Transaksi
        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/', [TransaksiController::class, 'index'])->name('index');
            Route::get('/{orderId}/edit', [TransaksiController::class, 'editStatus'])->name('edit')->whereNumber('orderId');
            Route::put('/{orderId}/update-status', [TransaksiController::class, 'updateStatus'])->name('updateStatus')->whereNumber('orderId');
        });

        // Rute Layanan
        Route::resource('services', ServiceController::class);

        // Rute Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });

    // Rute untuk Konsumen
    Route::middleware(['role:Konsumen'])->group(function () {
        // Rute Home Konsumen
        Route::get('/home', [HomeController::class, 'konsumenHome'])->name('home.konsumen');

        
       // Rute Pesanan
        Route::prefix('orders')->name('order.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index'); // Menampilkan semua pesanan
            Route::get('/create', [OrderController::class, 'createOrder'])->name('create'); // Halaman buat pesanan baru
            Route::post('/store', [OrderController::class, 'storeOrder'])->name('store'); // Proses simpan pesanan baru
            Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('edit')->whereNumber('id'); // Halaman edit pesanan
            Route::put('/{id}', [OrderController::class, 'update'])->name('update')->whereNumber('id'); // Proses update pesanan
        });

    });

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Anda berhasil logout.');
})->name('logout');


// Profil Pengguna
Route::view('/profile', 'profile')->middleware(['auth'])->name('profile');

// Rute Otentikasi
require __DIR__ . '/auth.php';

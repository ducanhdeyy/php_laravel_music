<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController as LoginAdminController;
use App\Http\Controllers\Admin\UserController as UserAdminController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\SingerController;
use App\Http\Controllers\Admin\SongController as SongAdminController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\TransactionController as TransactionAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\SongController;
use App\Http\Controllers\Client\PlaylistController;
use App\Http\Controllers\Client\TransactionController;
use App\Http\Controllers\Client\UserController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginAdminController::class, 'login'])->name('login');
    Route::get('/logout', [LoginAdminController::class, 'logout'])->name('logout');
});

Route::middleware('auth.admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('user', UserAdminController::class);
        Route::resource('genre', GenreController::class);
        Route::resource('singer', SingerController::class);
        Route::resource('album', AlbumController::class);
        Route::resource('song', SongAdminController::class);
        Route::get('transaction', [TransactionAdminController::class, 'index'])->name('transaction.index');
    });
});


// client
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.user');
Route::get('/register', [LoginController::class, 'signup'])->name('signup.user');
Route::post('/register', [LoginController::class, 'register'])->name('register.user');
Route::get('/song', [SongController::class, 'index'])->name('song.user');
Route::get('/charts', [HomeController::class, 'charts'])->name('charts.user');
Route::get('/artists', [HomeController::class, 'artists'])->name('artists.user');
Route::get('/singer/{id}', [HomeController::class, 'singerSong'])->name('singerSong');
Route::get('/singer-song', [HomeController::class, 'search'])->name('search');


Route::middleware('cus')->group(function () {

    Route::post('/downloads', [HomeController::class, 'download'])->name('download');
    Route::get('/playlist/{id}', [PlaylistController::class, 'index'])->name('playlist')->where('id', '[0-9]+');
    Route::post('/playlist/delete', [PlaylistController::class, 'delete'])->name('playlist.delete')->where('id', '[0-9]+');
    Route::post('/playlist', [PlaylistController::class, 'store'])->name('playlist.store');
    Route::get('/history/{id}', [TransactionController::class, 'history'])->name('history');
    Route::get('/setting', [HomeController::class, 'setting'])->name('setting');
    Route::post('/update-customer/{id}', [UserController::class, 'update'])->name('update.customer');
    Route::post('change-password/{id}', [UserController::class, 'changePassword'])->name('password.change');
    Route::post('/VNPay', [UserController::class, 'paymentVnpay'])->name('payment.vnpay');
    Route::get('/checkout', [UserController::class, 'checkoutVNPay'])->name('checkout');
});

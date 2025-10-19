<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

Route::resource('/pegawai', PegawaiController::class);

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/signup', function () {
    return view('simple-home');
})->name('signup.form');

Route::post('/signup', [HomeController::class, 'signup'])->name('signup.submit');

Route::get('/login', function () {
    return view('login-form');
})->name('login');

Route::post('/auth', [AuthController::class, 'login'])->name('auth.login');

Route::get('/auth', [AuthController::class, 'index'])->name('auth');

Route::get('/go/{tujuan}', [HomeController::class, 'redirectTo'])->name('go');
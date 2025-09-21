<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

Route::get('/pcr', function () {
 return 'Selamat Datang di Website Kampus PCR!';});

 Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

route :: get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);


Route::get('/about-buah', function () {
    return view('halaman-about-jus-buah');
});

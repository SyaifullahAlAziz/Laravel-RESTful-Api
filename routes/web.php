<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Registercontroller;
use App\Http\Controllers\Kategoricontroller;
use App\Http\Controllers\Karciscontroller;


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

Route::group(['middleware' => 'guest:login'], function () {
    Route::get('/', [Logincontroller::class, 'login'])->name('login');
    Route::post('aksilogin', [Logincontroller::class, 'aksilogin'])->name('aksilogin');
    Route::get('register', [Registercontroller::class, 'register'])->name('register');
    Route::post('daftar', [Logincontroller::class, 'daftar'])->name('daftar');
});

Route::group(['middleware' => ['web', 'auth:login']], function () {
    Route::get('home', [Homecontroller::class, 'index'])->name('home');
    Route::get('user', [Usercontroller::class, 'index'])->name('user');
    Route::get('input-user', [Usercontroller::class, 'tambahUser'])->name('input-user');
    Route::post('simpan-user', [Usercontroller::class, 'save'])->name('simpan-user');
    Route::get('edit-user/{id}', [Usercontroller::class, 'edituser'])->name('edit-user');
    Route::post('update-user/{id}', [Usercontroller::class, 'updateuser'])->name('update-user');
    Route::get('hapus-user/{id}', [Usercontroller::class, 'hapususer'])->name('hapus-user');

    Route::get('kategori', [Kategoricontroller::class, 'index'])->name('kategori');
    Route::get('input-kategori', [Kategoricontroller::class, 'tambahkategori'])->name('input-kategori');
    Route::post('simpan-kategori', [Kategoricontroller::class, 'save'])->name('simpan-kategori');
    Route::get('edit-kategori/{id}', [Kategoricontroller::class, 'editkategori'])->name('edit-kategori');
    Route::post('update-kategori/{id}', [Kategoricontroller::class, 'updatekategori'])->name('update-kategori');
    Route::get('hapus-kategori/{id}', [Kategoricontroller::class, 'hapuskategori'])->name('hapus-kategori');

    Route::get('karcis', [Karciscontroller::class, 'index'])->name('karcis');
    Route::get('input-karcis', [Karciscontroller::class, 'tambahkarcis'])->name('input-karcis');
    Route::post('simpan-karcis', [Karciscontroller::class, 'save'])->name('simpan-karcis');
    Route::get('edit-karcis/{id}', [Karciscontroller::class, 'editkarcis'])->name('edit-karcis');
    Route::post('update-karcis/{id}', [Karciscontroller::class, 'updatekarcis'])->name('update-karcis');
    Route::get('print-karcis/{id}', [Karciscontroller::class, 'printkarcis'])->name('print-karcis');
    Route::get('hapus-karcis/{id}', [Karciscontroller::class, 'hapuskarcis'])->name('hapus-karcis');

    Route::post('logout', [Logincontroller::class, 'logout'])->name('logout');
});

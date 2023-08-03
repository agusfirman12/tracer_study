<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\AdminController;

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

// Route Admin
Route::get('/login-admin', [AdminController::class, 'index'])->name('login')->middleware('guest');
Route::post('/process-loginAdmin', [AdminController::class, 'processLogin'])->name('loginAdmin');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//Route Kondisi
Route::get('/kondisi-alumni/{kondisi}', [AdminController::class, 'kondisiAlumni'])->name('kondisi-alumni');
//End Route Kondisi

//Route Lihat Alumni
Route::get('/alumni/{jurusan}', [AdminController::class, 'viewAlumni'])->name('view-alumni');
//End Lihat Alumni

//route lihat jurusan
Route::get('/jurusan', [AdminController::class, 'viewJurusan'])->name('view-jurusan');
Route::get('/tambah-jurusan', [AdminController::class, 'addJurusan'])->name('add-jurusan');
Route::post('/store-jurusan', [AdminController::class, 'ProcessAddJurusan'])->name('process-add-jurusan');
Route::get('/ubah-jurusan/{id}', [AdminController::class, 'ubahJurusan'])->name('ubah-jurusan');
Route::post('/update-jurusan/{id}', [AdminController::class, 'updtJurusan'])->name('update-jurusan');
Route::get('/delete-jurusan/{id}', [AdminController::class, 'deleteJurusan'])->name('delete-jurusan');
//end lihat jurusan

// Login Alumni Route
Route::get('/', [LoginController::class, 'loginPage'])->name('landing');
Route::post('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');
Route::get('/process-login/auth', [LoginController::class, 'authenticateSiswa'])->name('auth-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// End Login Alumni Route

Route::prefix('/tracer-study')->group(function () {
    Route::get('/pofile', [TracerController::class, 'profile'])->name('profile');
    Route::post('/uploadImage', [TracerController::class, 'upload'])->name('uploadImage');
    Route::post('/updateNomor', [TracerController::class, 'updateNomor'])->name('updateNomor');

    Route::get('/status', [TracerController::class, 'status'])->name('status');
    Route::post('/proses-status', [TracerController::class, 'prosesStatus'])->name('proses-status');

    Route::get('/view-soal/{number}', [TracerController::class, 'viewSoal'])->name('viewSoal');
    Route::post('/proses-soal', [TracerController::class, 'storeSoal'])->name('prosesSoal');
    Route::get('/halaman-selesai', [TracerController::class, 'finish'])->name('finish');
    Route::post('/proses-selesai', [TracerController::class, 'prosesSelesai'])->name('prosesSelesai');
});


Route::resource('/soal', BankSoalController::class);
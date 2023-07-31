<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\BankSoalController;

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

// login alumni route
Route::get('/', [LoginController::class, 'loginPage'])->name('landing');
Route::post('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');
Route::get('/process-login/auth', [LoginController::class, 'authenticateSiswa'])->name('auth-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// End login alumni route

Route::prefix('/tracer-study')->group(function () {
    Route::get('/pofile', [TracerController::class, 'profile'])->name('profile');
    Route::post('/uploadImage', [TracerController::class, 'upload'])->name('uploadImage');
    Route::post('/updateNomor', [TracerController::class, 'updateNomor'])->name('updateNomor');

    Route::get('/status', [TracerController::class, 'status'])->name('status');
    Route::post('/proses-status', [TracerController::class, 'prosesStatus'])->name('proses-status');

    Route::get('/view-soal/{number}', [TracerController::class, 'viewSoal'])->name('viewSoal');
    Route::post('/proses-soal', [TracerController::class, 'storeSoal'])->name('prosesSoal');
});


Route::resource('/soal', BankSoalController::class);
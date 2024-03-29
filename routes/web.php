<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KKonsultasiController;
use App\Http\Controllers\TopikController;

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


Auth::routes();
Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('master/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');

Route::get('master/petugas', [PetugasController::class, 'index'])->name('petugas');
Route::post('petugas/store', [PetugasController::class, 'store']);
Route::get('petugas/show/{id}', [PetugasController::class, 'show']);
Route::post('petugas/update', [PetugasController::class, 'update']);
Route::post('petugas/destroy/{id}', [PetugasController::class, 'destroy']);
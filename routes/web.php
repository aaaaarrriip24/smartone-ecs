<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KKonsultasiController;
use App\Http\Controllers\KProdukController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\DataController;

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

// Data
// Route::get('provinsi/data/', [DataController::class, 'provinsi'])->name('get');
// Route::get('kabkota/data/', [DataController::class, 'kabkota']);
Route::get('provinces', [DataController::class, 'provinces'])->name('provinces');
Route::get('cities', [DataController::class, 'cities'])->name('cities');
Route::get('districts', [DataController::class, 'districts'])->name('districts');
Route::get('villages', [DataController::class, 'villages'])->name('villages');

// Perusahaan
Route::get('master/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
Route::post('perusahaan/store', [PerusahaanController::class, 'store']);
Route::get('perusahaan/show/{id}', [PerusahaanController::class, 'show']);
Route::get('perusahaan/detail/{id}', [PerusahaanController::class, 'detail_show']);
Route::post('perusahaan/update', [PerusahaanController::class, 'update']);
Route::get('perusahaan/destroy/{id}', [PerusahaanController::class, 'destroy']);

// Petugas
Route::get('master/petugas', [PetugasController::class, 'index'])->name('petugas');
Route::post('petugas/store', [PetugasController::class, 'store']);
Route::get('petugas/show/{id}', [PetugasController::class, 'show']);
Route::post('petugas/update', [PetugasController::class, 'update']);
Route::get('petugas/destroy/{id}', [PetugasController::class, 'destroy']);

// Topik
Route::get('master/topik', [TopikController::class, 'index'])->name('topik');
Route::post('topik/store', [TopikController::class, 'store']);
Route::get('topik/show/{id}', [TopikController::class, 'show']);
Route::post('topik/update', [TopikController::class, 'update']);
Route::get('topik/destroy/{id}', [TopikController::class, 'destroy']);

// Tipe
Route::get('master/tipe', [TipeController::class, 'index'])->name('tipe');
Route::post('tipe/store', [TipeController::class, 'store']);
Route::get('tipe/show/{id}', [TipeController::class, 'show']);
Route::post('tipe/update', [TipeController::class, 'update']);
Route::get('tipe/destroy/{id}', [TipeController::class, 'destroy']);

// Kategori Produk
Route::get('master/k_produk', [KProdukController::class, 'index'])->name('kproduk');
Route::post('k_produk/store', [KProdukController::class, 'store']);
Route::get('k_produk/show/{id}', [KProdukController::class, 'show']);
Route::post('k_produk/update', [KProdukController::class, 'update']);
Route::get('k_produk/destroy/{id}', [KProdukController::class, 'destroy']);
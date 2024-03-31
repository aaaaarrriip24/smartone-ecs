<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KProdukController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TKonsultasiController;
use App\Http\Controllers\TBmController;
use App\Http\Controllers\TinquiryController;
use App\Http\Controllers\TexportController;

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
Route::get('provinces', [DataController::class, 'provinces'])->name('provinces');
Route::get('cities', [DataController::class, 'cities'])->name('cities');
// Route::get('districts', [DataController::class, 'districts'])->name('districts');
// Route::get('villages', [DataController::class, 'villages'])->name('villages');

// Select
Route::get('select/perusahaan', [SelectController::class, 'selectperusahaan']);
Route::get('select/topik', [SelectController::class, 'selecttopik']);
Route::get('select/petugas', [SelectController::class, 'selectpetugas']);
Route::get('select/bm', [SelectController::class, 'selectbm']);

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

// Transaksi
// Konsultasi
Route::get('transaksi/konsultasi', [TKonsultasiController::class, 'index'])->name('tkonsultasi');
Route::get('konsultasi/add', [TKonsultasiController::class, 'create']);
Route::get('konsultasi/detail/{id}', [TKonsultasiController::class, 'detail']);
Route::post('konsultasi/store', [TKonsultasiController::class, 'store']);
Route::get('konsultasi/show/{id}', [TKonsultasiController::class, 'show']);
Route::post('konsultasi/update', [TKonsultasiController::class, 'update']);
Route::get('konsultasi/destroy/{id}', [TKonsultasiController::class, 'destroy']);

// BM
Route::get('transaksi/bm', [TBmController::class, 'index'])->name('tbm');
Route::get('bm/add', [TBmController::class, 'create']);
Route::get('bm/detail/{id}', [TBmController::class, 'detail']);
Route::post('bm/store', [TBmController::class, 'store']);
Route::get('bm/show/{id}', [TBmController::class, 'show']);
Route::post('bm/update', [TBmController::class, 'update']);
Route::get('bm/destroy/{id}', [TBmController::class, 'destroy']);

// Inquiry
Route::get('transaksi/inquiry', [TinquiryController::class, 'index'])->name('tinquiry');
Route::get('inquiry/add', [TinquiryController::class, 'create']);
Route::get('inquiry/detail/{id}', [TinquiryController::class, 'detail']);
Route::post('inquiry/store', [TinquiryController::class, 'store']);
Route::get('inquiry/show/{id}', [TinquiryController::class, 'show']);
Route::post('inquiry/update', [TinquiryController::class, 'update']);
Route::get('inquiry/destroy/{id}', [TinquiryController::class, 'destroy']);

// Export
Route::get('transaksi/export', [TexportController::class, 'index'])->name('texport');
Route::get('export/add', [TexportController::class, 'create']);
Route::get('export/detail/{id}', [TexportController::class, 'detail']);
Route::post('export/store', [TexportController::class, 'store']);
Route::get('export/show/{id}', [TexportController::class, 'show']);
Route::post('export/update', [TexportController::class, 'update']);
Route::get('export/destroy/{id}', [TexportController::class, 'destroy']);
Route::get('export/download_dok/{file}', [TexportController::class, 'download_dok']);
Route::get('export/download_bukti/{file}', [TexportController::class, 'download_bukti']);
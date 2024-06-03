<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KProdukController;
use App\Http\Controllers\MSubKategoriController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TKonsultasiController;
use App\Http\Controllers\TBmController;
use App\Http\Controllers\TinquiryController;
use App\Http\Controllers\TexportController;
use App\Http\Controllers\PPBmController;
use App\Http\Controllers\PPInaexportController;
use App\Http\Controllers\PPInquiryController;

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
Auth::routes();

Route::get('/', [HomePageController::class, 'index']);
Route::get('about', [HomePageController::class, 'about']);
Route::get('supplier', [HomePageController::class, 'supplier']);
Route::get('gallery', [HomePageController::class, 'gallery']);
Route::get('news', [HomePageController::class, 'news']);
Route::get('contact', [HomePageController::class, 'contact']);

// Handle Back Button
Route::group(['middleware' => 'prevent-back-history'],function(){
    // Route Admin
    Route::group(['middleware' => 'admin'],function() {
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('section1', [HomeController::class, 'section1']);
        Route::get('section2', [HomeController::class, 'section2']);
        Route::get('section3', [HomeController::class, 'section3']);

        // Data
        Route::get('provinces', [DataController::class, 'provinces'])->name('provinces');
        Route::get('cities', [DataController::class, 'cities'])->name('cities');
        // Route::get('districts', [DataController::class, 'districts'])->name('districts');
        // Route::get('villages', [DataController::class, 'villages'])->name('villages');

        // Select
        Route::get('select/perusahaan', [SelectController::class, 'selectperusahaan']);
        Route::get('select/tipe', [SelectController::class, 'selecttipe']);
        Route::get('select/topik', [SelectController::class, 'selecttopik']);
        Route::get('select/petugas', [SelectController::class, 'selectpetugas']);
        Route::get('select/negara', [SelectController::class, 'selectnegara']);
        Route::get('select/bm', [SelectController::class, 'selectbm']);
        Route::get('select/inquiry', [SelectController::class, 'selectinquiry']);
        Route::get('select/k_produk', [SelectController::class, 'selectk_produk']);

        // Perusahaan
        Route::get('master/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
        Route::get('perusahaan/add', [PerusahaanController::class, 'create']);
        Route::get('perusahaan/detail/{id}', [PerusahaanController::class, 'detail']);
        Route::post('perusahaan/store', [PerusahaanController::class, 'store']);
        Route::get('perusahaan/show/{id}', [PerusahaanController::class, 'show']);
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
        // Sub Kategori Produk
        Route::get('master/m_sub_kategori', [MSubKategoriController::class, 'index'])->name('m_sub_kategori');
        Route::post('m_sub_kategori/store', [MSubKategoriController::class, 'store']);
        Route::get('m_sub_kategori/show/{id}', [MSubKategoriController::class, 'show']);
        Route::post('m_sub_kategori/update', [MSubKategoriController::class, 'update']);
        Route::get('m_sub_kategori/destroy/{id}', [MSubKategoriController::class, 'destroy']);

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

        // Extra
        // PPBM
        Route::get('extra/ppbm', [PPBmController::class, 'index'])->name('ppbm');
        Route::get('ppbm/add', [PPBmController::class, 'create']);
        Route::get('ppbm/detail/{id}', [PPBmController::class, 'detail']);
        Route::post('ppbm/store', [PPBmController::class, 'store']);
        Route::get('ppbm/show', [PPBmController::class, 'show']);
        Route::get('ppbm/list/{id}', [PPBmController::class, 'list']);
        Route::post('ppbm/update', [PPBmController::class, 'update']);
        Route::get('ppbm/destroy/{id}', [PPBmController::class, 'destroy']);

        // PPInquiry
        Route::get('extra/p_inquiry', [PPInquiryController::class, 'index'])->name('p_inquiry');
        Route::get('p_inquiry/add', [PPInquiryController::class, 'create']);
        Route::get('p_inquiry/detail/{id}', [PPInquiryController::class, 'detail']);
        Route::post('p_inquiry/store', [PPInquiryController::class, 'store']);
        Route::get('p_inquiry/show/{id}', [PPInquiryController::class, 'show']);
        Route::post('p_inquiry/update', [PPInquiryController::class, 'update']);
        Route::get('p_inquiry/destroy/{id}', [PPInquiryController::class, 'destroy']);

        // PPBM
        Route::get('extra/p_inaexport', [PPInaexportController::class, 'index'])->name('p_inaexport');
        Route::get('p_inaexport/add', [PPInaexportController::class, 'create']);
        Route::get('p_inaexport/detail/{id}', [PPInaexportController::class, 'detail']);
        Route::post('p_inaexport/store', [PPInaexportController::class, 'store']);
        Route::get('p_inaexport/show/{id}', [PPInaexportController::class, 'show']);
        Route::post('p_inaexport/update', [PPInaexportController::class, 'update']);
        Route::get('p_inaexport/destroy/{id}', [PPInaexportController::class, 'destroy']);
    });
});

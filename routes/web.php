<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
use App\Http\Controllers\BroadcastEmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PartisipasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiLayananController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ArtikelController;

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

Route::get('change-language/{lang}', [HomePageController::class, 'changeLanguage'])->name('change.language');

Route::get('/', [HomePageController::class, 'index']);
Route::get('about', [HomePageController::class, 'about']);
Route::get('services', [HomePageController::class, 'services']);
Route::get('gallery', [HomePageController::class, 'gallery']);
Route::get('news', [HomePageController::class, 'news']);
Route::get('contact', [HomePageController::class, 'contact']);
Route::get('our-konsultasi', [HomePageController::class, 'our_konsultasi']);
Route::get('our-inquiries', [HomePageController::class, 'our_inquiries']);
Route::get('our-bm', [HomePageController::class, 'our_bm']);
Route::get('our-panduan', [HomePageController::class, 'our_panduan']);
Route::get('other-service', [HomePageController::class, 'other_service']);
Route::get('our-supplier', [HomePageController::class, 'our_supplier']);
Route::get('our-market', [HomePageController::class, 'our_market']);
Route::get('other-relasi', [HomePageController::class, 'other_relasi']);
// Lang
Route::get('lang/change', [HomePageController::class, 'change'])->name('changeLang');

// Artikel
Route::get('artikel/{spices}', [HomePageController::class, 'artikel']);
Route::get('artikel/{fish}', [HomePageController::class, 'artikel']);
Route::get('artikel/{furniture}', [HomePageController::class, 'artikel']);
Route::get('artikel/{coffee}', [HomePageController::class, 'artikel']);
Route::get('artikel/{food}', [HomePageController::class, 'artikel']);
Route::get('artikel/{manufacture}', [HomePageController::class, 'artikel']);

// Data
Route::get('data_topik', [HomePageController::class, 'data_topik']);
Route::get('data_berita', [HomePageController::class, 'data_berita']);
Route::get('section1', [HomePageController::class, 'section1']);
Route::get('section2', [HomePageController::class, 'section2']);
Route::get('section3', [HomePageController::class, 'section3']);

// Contact
Route::post('contact/send/', [HomePageController::class, 'send'])->name('contact.send');
// Berita
Route::get('news', [HomePageController::class, 'berita']);
Route::get('news/detail/{id}', [HomePageController::class, 'berita_detail']);


Route::get('/change-language', function (Request $request) {
    $locale = $request->input('locale');
    Session::put('locale', $locale);
    
    return redirect()->back();
})->name('change-language');


// Handle Back Button
Route::post('login_from', [LoginController::class, 'authenticate']);
Route::group(['middleware' => 'prevent-back-history'],function(){
    // Route Admin
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('update/profile', [ProfileController::class, 'update']);
    Route::get('change-password', [ProfileController::class, 'index']);
    Route::post('change-password', [ProfileController::class, 'store'])->name('change.password');

    Route::group(['middleware' => 'superadmin'],function() {
        // User Management
        Route::get('setting/user', [ManagementUserController::class, 'index'])->name('management');
        Route::post('user/store', [ManagementUserController::class, 'store']);
        Route::get('user/show/{id}', [ManagementUserController::class, 'show']);
        Route::post('user/update', [ManagementUserController::class, 'update']);
        Route::get('user/destroy/{id}', [ManagementUserController::class, 'destroy']);
        // Route::get('user/send/{id}', [ManagementUserController::class, 'send']);
        Route::post('user/send', [ManagementUserController::class, 'send']);
    });

    Route::group(['middleware' => 'admin'],function() {
        // News
        Route::get('master/berita', [BeritaController::class, 'index'])->name('berita');
        Route::post('berita/store', [BeritaController::class, 'store']);
        Route::get('berita/show/{id}', [BeritaController::class, 'show']);
        Route::post('berita/update', [BeritaController::class, 'update']);
        Route::get('berita/destroy/{id}', [BeritaController::class, 'destroy']);

        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Data
        Route::get('perusahaan/provinces', [DataController::class, 'perusahaan_provinces'])->name('perusahaan_provinces');
        Route::get('perusahaan/cities', [DataController::class, 'perusahaan_cities'])->name('perusahaan_cities');
        Route::get('provinces', [DataController::class, 'provinces'])->name('provinces');
        Route::get('cities', [DataController::class, 'cities'])->name('cities');
        // Route::get('districts', [DataController::class, 'districts'])->name('districts');
        // Route::get('villages', [DataController::class, 'villages'])->name('villages');

        // Select
        Route::get('select/perusahaan', [SelectController::class, 'selectperusahaan']);
        Route::post('select/perusahaan/sub_kategori', [SelectController::class, 'select_perusahaan_sub_kategori']);
        Route::post('select/perusahaan/id_template', [SelectController::class, 'select_perusahaan_id_template']);
        Route::get('select/filterperusahaan', [SelectController::class, 'filterperusahaan']);
        Route::get('select/tipe', [SelectController::class, 'selecttipe']);
        Route::get('select/topik', [SelectController::class, 'selecttopik']);
        Route::get('select/petugas', [SelectController::class, 'selectpetugas']);
        Route::get('select/layanan', [SelectController::class, 'selectlayanan']);
        Route::get('select/negara', [SelectController::class, 'selectnegara']);
        Route::get('select/bm', [SelectController::class, 'selectbm']);
        Route::get('select/inquiry', [SelectController::class, 'selectinquiry']);
        Route::get('select/k_produk', [SelectController::class, 'selectk_produk']);
        Route::get('select/sub_produk', [SelectController::class, 'select_sub_kategori']);
        Route::get('select/sub_produk2', [SelectController::class, 'select_sub_kategori2']);
        Route::get('select/perusahaan2/{id}', [SelectController::class, 'perusahaan2']);

        // Perusahaan
        Route::get('master/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
        Route::get('perusahaan/add', [PerusahaanController::class, 'create']);
        Route::post('perusahaan/pdf', [PerusahaanController::class, 'pdf']);
        Route::get('perusahaan/detail/layanan/{id}', [PerusahaanController::class, 'pdf_layanan']);
        Route::get('perusahaan/detail/{id}', [PerusahaanController::class, 'detail']);
        Route::post('perusahaan/store', [PerusahaanController::class, 'store']);
        Route::get('perusahaan/show/{id}', [PerusahaanController::class, 'show']);
        Route::post('perusahaan/update', [PerusahaanController::class, 'update']);
        Route::get('perusahaan/destroy/{id}', [PerusahaanController::class, 'destroy']);
        
        // BroadcastEmail
        Route::get('transaksi/broadcast', [BroadcastEmailController::class, 'email_index'])->name('broadcast');
        Route::get('broadcast/add', [BroadcastEmailController::class, 'create']);
        Route::post('broadcast/store', [BroadcastEmailController::class, 'sendBulk']);
        Route::post('broadcast/draft', [BroadcastEmailController::class, 'draftEmail']);
        Route::post('broadcast/update', [BroadcastEmailController::class, 'update']);
        Route::get('broadcast/show/{id}', [BroadcastEmailController::class, 'show']);
        Route::get('broadcast/detail/{id}', [BroadcastEmailController::class, 'detail']);
        Route::get('broadcast/destroy/{id}', [BroadcastEmailController::class, 'destroy']);
        Route::post('broadcast/send', [BroadcastEmailController::class, 'sendDraft']);
        
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

        // Layanan Lainnya
        Route::get('master/layanan', [LayananController::class, 'index'])->name('layanan');
        Route::post('layanan/store', [LayananController::class, 'store']);
        Route::get('layanan/show/{id}', [LayananController::class, 'show']);
        Route::post('layanan/update', [LayananController::class, 'update']);
        Route::get('layanan/destroy/{id}', [LayananController::class, 'destroy']);
        
        // Transaksi
        // Layanan
        Route::get('transaksi/lain', [TransaksiLayananController::class, 'index'])->name('lain');
        Route::get('lain/add', [TransaksiLayananController::class, 'create']);
        Route::get('lain/detail/{id}', [TransaksiLayananController::class, 'detail']);
        Route::post('lain/pdf', [TransaksiLayananController::class, 'pdf']);
        Route::post('lain/store', [TransaksiLayananController::class, 'store']);
        Route::get('lain/show/{id}', [TransaksiLayananController::class, 'show']);
        Route::post('lain/update', [TransaksiLayananController::class, 'update']);
        Route::get('lain/destroy/{id}', [TransaksiLayananController::class, 'destroy']);
        // Konsultasi
        Route::get('transaksi/konsultasi', [TKonsultasiController::class, 'index'])->name('tkonsultasi');
        Route::get('konsultasi/add', [TKonsultasiController::class, 'create']);
        Route::get('konsultasi/detail/{id}', [TKonsultasiController::class, 'detail']);
        Route::post('konsultasi/pdf', [TKonsultasiController::class, 'pdf']);
        Route::post('konsultasi/store', [TKonsultasiController::class, 'store']);
        Route::get('konsultasi/show/{id}', [TKonsultasiController::class, 'show']);
        Route::post('konsultasi/update', [TKonsultasiController::class, 'update']);
        Route::get('konsultasi/destroy/{id}', [TKonsultasiController::class, 'destroy']);

        // BM
        Route::get('transaksi/bm', [TBmController::class, 'index'])->name('tbm');
        Route::get('bm/add', [TBmController::class, 'create']);
        Route::get('bm/detail/{id}', [TBmController::class, 'detail']);
        Route::post('bm/pdf', [TBmController::class, 'pdf']);
        Route::post('bm/store', [TBmController::class, 'store']);
        Route::get('bm/show/{id}', [TBmController::class, 'show']);
        Route::post('bm/update', [TBmController::class, 'update']);
        Route::get('bm/destroy/{id}', [TBmController::class, 'destroy']);

        // Inquiry
        Route::get('transaksi/inquiry', [TinquiryController::class, 'index'])->name('tinquiry');
        Route::get('inquiry/add', [TinquiryController::class, 'create']);
        Route::get('inquiry/detail/{id}', [TinquiryController::class, 'detail']);
        Route::post('inquiry/pdf', [TinquiryController::class, 'pdf']);
        Route::post('inquiry/store', [TinquiryController::class, 'store']);
        Route::get('inquiry/show/{id}', [TinquiryController::class, 'show']);
        Route::post('inquiry/update', [TinquiryController::class, 'update']);
        Route::get('inquiry/destroy/{id}', [TinquiryController::class, 'destroy']);

        // Export
        Route::get('transaksi/export', [TexportController::class, 'index'])->name('texport');
        Route::get('export/add', [TexportController::class, 'create']);
        Route::get('export/detail/{id}', [TexportController::class, 'detail']);
        Route::post('export/pdf', [TexportController::class, 'pdf']);
        Route::post('export/store', [TexportController::class, 'store']);
        Route::get('export/show/{id}', [TexportController::class, 'show']);
        Route::post('export/update', [TexportController::class, 'update']);
        Route::get('export/destroy/{id}', [TexportController::class, 'destroy']);
        Route::get('export/download_dok/{file}', [TexportController::class, 'download_dok']);
        Route::get('export/download_bukti/{file}', [TexportController::class, 'download_bukti']);

        // Partisipasi
        Route::get('transaksi/partisipasi', [PartisipasiController::class, 'index'])->name('t_partisipasi');
        Route::get('partisipasi/add', [PartisipasiController::class, 'create']);
        Route::get('partisipasi/detail/{id}', [PartisipasiController::class, 'detail']);
        Route::post('partisipasi/pdf', [PartisipasiController::class, 'pdf']);
        Route::post('partisipasi/store', [PartisipasiController::class, 'store']);
        Route::get('partperusahaan/show', [PPBmController::class, 'partperusahaan']);
        Route::get('partisipasi/show/{id}', [PartisipasiController::class, 'show']);
        Route::post('partisipasi/update', [PartisipasiController::class, 'update']);
        Route::get('partisipasi/destroy/{id}', [PartisipasiController::class, 'destroy']);

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
        Route::get('p_inquiry/show', [PPInquiryController::class, 'show']);
        Route::post('p_inquiry/update', [PPInquiryController::class, 'update']);
        Route::get('p_inquiry/destroy/{id}', [PPInquiryController::class, 'destroy']);

        // PPBM
        Route::get('extra/p_inaexport', [PPInaexportController::class, 'index'])->name('p_inaexport');
        Route::get('p_inaexport/add', [PPInaexportController::class, 'create']);
        Route::post('p_inaexport/pdf', [PPInaexportController::class, 'pdf']);
        Route::get('p_inaexport/detail/{id}', [PPInaexportController::class, 'detail']);
        Route::post('p_inaexport/store', [PPInaexportController::class, 'store']);
        Route::get('p_inaexport/show/{id}', [PPInaexportController::class, 'show']);
        Route::post('p_inaexport/update', [PPInaexportController::class, 'update']);
        Route::get('p_inaexport/destroy/{id}', [PPInaexportController::class, 'destroy']);

        // Laporan
        Route::get('laporan/perusahaan', [LaporanController::class, 'perusahaan']);
        Route::get('laporan/konsultasi', [LaporanController::class, 'konsultasi']);
        Route::get('laporan/bm', [LaporanController::class, 'bm']);
        Route::get('laporan/inquiry', [LaporanController::class, 'inquiry']);
        Route::get('laporan/export', [LaporanController::class, 'export']);
        Route::get('laporan/ina_export', [LaporanController::class, 'ina_export']);
        Route::get('laporan/lain', [LaporanController::class, 'lain']);
        Route::get('laporan/partisipasi', [LaporanController::class, 'partisipasi']);
        
    });
});

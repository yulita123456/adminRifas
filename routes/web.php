<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\captchaServiceController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\kategoriProdukController;
use App\Http\Controllers\keranjangController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\lupaPasswordController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\orderControllerAdmin;
use App\Http\Controllers\produkController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\tokoController;
use App\Http\Controllers\userController;
use App\Http\Controllers\wishlistController;
use App\Models\lupaPassword;
use Illuminate\Support\Facades\Route;

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


// Route::middleware('redirectAdminUser')->group(function () {

    Route::get('/', [homeController::class,'index']);
    Route::get('/home', [homeController::class,'index']);
// });

Route::get('/produk/{id}', [homeController::class, 'show'])->name('produk.show');

// Route grup middleware check login
Route::middleware('auth.check')->group(function () {
    Route::get('/profil', [profilController::class, 'index']);
    Route::post('/profil', [profilController::class, 'updateProfil'])->name('update.profil');
    // Route pesanan user
    Route::get('/pesanan', [orderController::class, 'index'])->name('pesanan.semua');
    Route::get('/pesanan-menunggu-konfirmasi', [orderController::class, 'pesananMenungguKonfirmasi'])->name('pesanan.menunggu-konfirmasi');
    Route::get('/pesanan-dikemas', [orderController::class, 'pesananDikemas'])->name('pesanan.dikemas');
    Route::get('/pesanan-dikirim', [orderController::class, 'pesananDikirim'])->name('pesanan.dikirim');
    Route::get('/pesanan-selesai', [orderController::class, 'pesananSelesai'])->name('pesanan.selesai');
    Route::get('/pesanan-dibatalkan', [orderController::class, 'pesananDibatalkan'])->name('pesanan.dibatalkan');
    Route::get('/pesanan-dikembalikan', [orderController::class, 'pesananDikembalikan'])->name('pesanan.dikembalikan');
    Route::get('/pesanan-diterima/{id}', [orderController::class, 'terimaPesanan'])->name('pesanan.diterima');
    Route::get('/batalkan-pesanan/{id}', [orderController::class, 'batalkanPesanan'])->name('batalkan.pesanan');


    // Route alamat user
    Route::get('/alamat', [userController::class, 'alamatUser']);

    // Route Wishlist user
    Route::get('/wishlist', [wishlistController::class, 'index']);
    Route::post('/wishlist/{id}', [wishlistController::class, 'tambahWishlist'])->name('tambah.wishlist');
    Route::get('/wishlist/{id}', [wishlistController::class, 'hapusWishlist'])->name('hapus.wishlist');


    Route::post('/tambah-keranjang/{id}', [keranjangController::class, 'tambahKeranjang']);
    Route::get('/hapus-keranjang/{id}', [keranjangController::class, 'hapusKeranjang'])->name('hapus-keranjang');
    Route::get('/order/create', [keranjangController::class, 'viewOrder'])->name('view-order');
    Route::post('/order/store', [keranjangController::class, 'prosesOrder'])->name('proses-order');
});


// Route Untuk kategori produk
Route::get('/semua', [kategoriProdukController::class, 'index']);
Route::get('/perawatan-badan', [kategoriProdukController::class, 'perawatanBadan']);
Route::get('/perawatan-wajah', [kategoriProdukController::class, 'perawatanWajah']);
Route::get('/perawatan-rambut', [kategoriProdukController::class, 'perawatanRambut']);
Route::get('/parfum', [kategoriProdukController::class, 'parfum']);
Route::post('/update-categories', [kategoriProdukController::class, 'updateCategories']);


Route::middleware(['auth.check'])->group(function () {

    // Route Admin
    Route::get('/dashboard-admin', [dashboardController::class, 'index']);
    Route::get('/orders', [dashboardController::class, 'dataOrder']);
    Route::get('/pesanan-admin', [orderControllerAdmin::class, 'index'])->name('pesananAdmin.semua');
    Route::get('/pesanan-admin-baru', [orderControllerAdmin::class, 'pesananBaru'])->name('pesananAdmin.baru');
    Route::get('/pesanan-admin-dikemas', [orderControllerAdmin::class, 'pesananDikemas'])->name('pesananAdmin.dikemas');
    Route::get('/pesanan-admin-siap-diambil', [orderControllerAdmin::class, 'pesananSiapDiAmbil'])->name('pesananAdmin.siap-diambil');
    Route::get('/pesanan-admin-selesai', [orderControllerAdmin::class, 'pesananSelesai'])->name('pesananAdmin.selesai');
    Route::get('/pesanan-admin-dibatalkan', [orderControllerAdmin::class, 'pesananDibatalkan'])->name('pesananAdmin.dibatalkan');
    Route::get('/pesanan-admin-dikembalikan', [orderControllerAdmin::class, 'pesananDikembalikan'])->name('pesananAdmin.dikembalikan');
    Route::get('/terima-pesanan/{id}', [orderControllerAdmin::class, 'terimaPesanan'])->name('terima-pesanan');
    Route::get('/tolak-pesanan/{id}', [orderControllerAdmin::class, 'tolakPesanan'])->name('tolak-pesanan');
    Route::get('/pesanan-siap/{id}', [orderControllerAdmin::class, 'pesananSiap'])->name('pesanan-siap');
});




Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'prosesRegister'])->name('proses.register');
Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'prosesLogin'])->name('proses.login')->middleware('redirectAdminUser');
Route::get('/logout', [loginController::class, 'logout'])->name('proses.logout');
// reload captcha
Route::get('/reload-captcha', [captchaServiceController::class, 'reloadCaptcha']);


Route::get('/produk-admin',[produkController::class,'index']);
Route::get('/produk-admin/create',[produkController::class,'create']);
Route::post('/produk-admin/store',[produkController::class,'store']);
Route::get('/produk-admin/edit/{id}',[produkController::class,'edit']);
Route::post('/produk-admin/update/{id}',[produkController::class,'update']);
Route::get('/produk-admin/destroy/{id}',[produkController::class,'destroy']);


// Route seting toko dan profil admin
Route::middleware(['auth'])->group(function () {
    Route::get('/seting-profil-admin',[adminController::class,'index']);
    Route::post('/seting-profil-admin/update',[adminController::class,'update']);
    Route::get('/seting-toko-admin',[tokoController::class,'index']);
    Route::post('/seting-toko-admin/update',[tokoController::class,'update']);
});


// Route::post('/toko/update/{id}', [tokoController::class,'update']);

Route::get('/lupa-password', [lupaPasswordController::class, 'index'])->name('lupa.password.index');
Route::post('/lupa-password', [lupaPasswordController::class, 'lupaPasswordPost'])->name('lupa.password.post');
Route::get('/reset-password/{token}', [lupaPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [lupaPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

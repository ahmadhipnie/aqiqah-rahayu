<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route landing page
Route::get('/', [LandingController::class, 'index'])->name('index');
Route::get('/about', [LandingController::class, 'about'])->name('about');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
Route::get('/events', [LandingController::class, 'events'])->name('events');
Route::get('/blog', [LandingController::class, 'blog'])->name('blog');
Route::get('/harga', [LandingController::class, 'harga'])->name('harga');

Route::get('/hubungiWhatsapp1', [LandingController::class, 'hubungiWhatsappNomor1'])->name('hubungiWhatsappNomor1');
Route::get('/hubungiWhatsapp2', [LandingController::class, 'hubungiWhatsappNomor2'])->name('hubungiWhatsappNomor2');

Route::get('/blog/{id}', [LandingController::class, 'detailBlog'])->name('blog.detail');
Route::get('/produk/{id}', [LandingController::class, 'detailProduk'])->name('produk.detail');
Route::get('/events/{id}', [LandingController::class, 'detailEvents'])->name('events.detail');

//route admin
Route::get('/login-admin', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login-admin', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout-admin', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');


//route blog admin
Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog');
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
Route::post('/admin/blog', [BlogController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
Route::post('/admin/blog/{id}/update', [BlogController::class, 'update'])->name('admin.blog.update');
Route::delete('/admin/blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');


//route events admin
Route::get('/admin/events', [EventsController::class, 'index'])->name('admin.events');
Route::get('/admin/events/create', [EventsController::class, 'create'])->name('admin.events.create');
Route::post('/admin/events', [EventsController::class, 'store'])->name('admin.events.store');
Route::get('/admin/events/{id}/edit', [EventsController::class, 'edit'])->name('admin.events.edit');
Route::post('/admin/events/{id}/update', [EventsController::class, 'update'])->name('admin.events.update');
Route::delete('/admin/events/{id}', [EventsController::class, 'destroy'])->name('admin.events.destroy');


//route produk admin
Route::get('/admin/produk', [ProdukController::class, 'index'])->name('admin.produk');
Route::get('/admin/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
Route::post('/admin/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
Route::get('/admin/produk/{id}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
Route::post('/admin/produk/{id}/update', [ProdukController::class, 'update'])->name('admin.produk.update');
Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');


//route galeri admin
Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
Route::get('/admin/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
Route::post('/admin/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
Route::get('/admin/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
Route::post('/admin/galeri/{id}/update', [GaleriController::class, 'update'])->name('admin.galeri.update');
Route::delete('/admin/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');


//route transaksi admin
Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
Route::get('/admin/transaksi/export', [TransaksiController::class, 'export'])->name('admin.transaksi.export');



//route testimoni admin
Route::get('/admin/testimoni', [TestimoniController::class, 'index'])->name('admin.testimoni');
Route::get('/admin/testimoni/create', [TestimoniController::class, 'create'])->name('admin.testimoni.create');
Route::post('/admin/testimoni', [TestimoniController::class, 'store'])->name('admin.testimoni.store');
Route::get('/admin/testimoni/{id}/edit', [TestimoniController::class, 'edit'])->name('admin.testimoni.edit');
Route::post('/admin/testimoni/{id}/update', [TestimoniController::class, 'update'])->name('admin.testimoni.update');
Route::delete('/admin/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');

//route transaksi pelanggan
Route::get('/transaksi', [TransaksiController::class, 'pergiKeTransaksiPelanggan'])->name('transaksi.pelanggan');
Route::post('/transaksi/snap-token', [TransaksiController::class, 'getSnapToken'])->name('transaksi.snap_token');
Route::post('/transaksi/snap-finish', [TransaksiController::class, 'snapFinish'])->name('transaksi.snap_finish');

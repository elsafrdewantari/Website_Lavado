<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PesananProsesController;
use App\Http\Controllers\PesananSelesaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SaranController;


// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk login admin (tidak memerlukan autentikasi)
// Route untuk login admin (tanpa autentikasi)
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');

// Route logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout'); // Gunakan POST untuk logout


// Contoh rute dashboard setelah login
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Halaman dashboard admin, hanya dapat diakses jika sudah login
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');



//

// Halaman pesanan dan pelanggan (seperti sebelumnya)
Route::get('/pesanan', [PesananProsesController::class, 'index'])->name('pesananproses.index');
Route::get('/pesanan/create', [PesananProsesController::class, 'create'])->name('pesananproses.create');
Route::post('/pesananstore', [PesananProsesController::class, 'store'])->name('pesananproses.store');
Route::get('pesanan/{id}/edit', [PesananProsesController::class, 'update'])->name('pesananproses.update');
Route::put('/pesanan/{id}', [PesananProsesController::class, 'update'])->name('pesananproses.update');
Route::delete('/pesanan/{id_pesanan}', [PesananProsesController::class, 'destroy'])->name('pesananproses.destroy');
Route::get('/pesanan/{id}', [PesananProsesController::class, 'show'])->name('pesananproses.show');
Route::get('pesanan/{id}/edit', [PesananProsesController::class, 'edit'])->name('pesananproses.edit');
Route::patch('/pesanan/{id_pesanan}/update-status', [PesananProsesController::class, 'updateStatus'])->name('pesananproses.updateStatus');
Route::get('/pesanan-selesai', [PesananSelesaiController::class, 'index'])->name('pesananselesai.index');



Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');


Route::resource('saran', SaranController::class);
Route::get('/saran', [SaranController::class, 'index'])->name('saran.index');


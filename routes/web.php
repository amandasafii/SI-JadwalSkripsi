<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\LoginController;
use App\HTTP\Controllers\LogoutController;
use App\HTTP\Controllers\DashboardAdminController;
use App\HTTP\Controllers\DashboardDosenController;
use App\HTTP\Controllers\DashboardMahasiswaController;
use App\HTTP\Controllers\MahasiswaAdminController;
use App\HTTP\Controllers\DosenAdminController;
use App\HTTP\Controllers\RuanganAdminController;
use App\HTTP\Controllers\JadwalAdminController;
use App\Http\Controllers\PengujiAdminController;
use App\HTTP\Controllers\JadwalMahasiswaController;
use App\HTTP\Controllers\CetakMahasiswaController;
use App\Http\Controllers\PengujiDosenController;
use App\HTTP\Controllers\CetakDosenController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
// use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/admin/dashboard', function () {
    $user = session('user');
    return "Halo Admin {$user['username']}!";
});

Route::get('/dosen/dashboard', function () {
    $user = session('user');
    return "Halo Dosen {$user['username']}!";
});

Route::get('/mahasiswa/dashboard', function () {
    $user = session('user');
    return "Halo Mahasiswa {$user['username']}!";
});


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
Route::get('/dashboard_admin', function () {
    return 'Selamat datang Admin!';
});

Route::get('/dashboard_dosen', function () {
    return 'Selamat datang Dosen!';
});

Route::get('/dashboard_mahasiswa', function () {
    return 'Selamat datang Mahasiswa!';
});


// Route::get('/', function () {
//     return view('login');
// });

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.proses');

// Route::resource('logout', LogoutController::class);
Route::get('/logout', function () {
    return view('login');
});

Route::get('/xxxx', function () {
    return view('cetak_dosen_pdf');
})->name('xxxx');

Route::resource('dashboard_dosen', DashboardDosenController::class);
Route::resource('dashboard_mahasiswa', DashboardMahasiswaController::class);
Route::resource('dashboard_admin', DashboardAdminController::class);

Route::resource('mahasiswa_admin', MahasiswaAdminController::class);
Route::resource('dosen_admin', DosenAdminController::class);
Route::resource('jadwal_admin', JadwalAdminController::class);
Route::resource('penguji_admin', PengujiAdminController::class);
Route::resource('ruangan_admin', RuanganAdminController::class);

Route::resource('penguji_dosen', PengujiDosenController::class);
Route::resource('cetak_dosen', CetakDosenController::class);
Route::get('/cetak-dosen-pdf', [CetakDosenController::class, 'exportPdf'])->name('cetak_dosen');

Route::resource('jadwal_mahasiswa', JadwalMahasiswaController::class);
Route::resource('cetak_mahasiswa', CetakMahasiswaController::class);
// Route::get('/cetak_mahasiswa/cari', [CetakMahasiswaController::class, 'cari'])->name('cetak_mahasiswa.cari');
// Route::get('/cetak_mahasiswa/pdf/{npm}', [CetakMahasiswaController::class, 'exportPdf'])->name('cetak_mahasiswa.pdf');

// Route::get('/cetak_mahasiswa/cari', [App\Http\Controllers\CetakMahasiswaController::class, 'cari'])->name('cetak_mahasiswa.cari');
// Route::get('/cetak_mahasiswa/pdf/{npm}', [App\Http\Controllers\CetakMahasiswaController::class, 'cetakPDF'])->name('cetak_mahasiswa.pdf');

// // Route resource utama
// Route::resource('cetak_mahasiswa', App\Http\Controllers\CetakMahasiswaController::class);


// Route::resource('login_admin', LoginAdminController::class);
// Route::resource('login_dosen', LoginDosenController::class);
// Route::resource('login_mahasiswa', LoginMahasiswaController::class);
// Route::resource('jadwal_dosen', JadwalDosenController::class);
// Route::resource('mahasiswa_dosen', MahasiswaDosenController::class);
// Route::resource('ruangan_dosen', RuanganDosenController::class);
// Route::resource('tambah_mahasiswa', MahasiswaAdminController::class);
// Route::resource('edit_mhsadmin', MahasiswaAdminController::class);
// Route::resource('edit_dashadmin', EditDashadminController::class);
// Route::resource('edit_dosenadmin', DosenadminController::class);
// Route::resource('tambah_dosenadmin', TambahDosenadminController::class);
// Route::resource('tambah_ruanganadmin', TambahRuanganadminController::class);
// Route::resource('edit_ruanganadmin', EditRuanganadminController::class);
// Route::resource('edit_cetakadmin', EditCetakadminController::class);

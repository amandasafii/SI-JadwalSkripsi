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

Route::get('/', function () {
  return view('welcome');
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

Route::resource('jadwal_mahasiswa', JadwalMahasiswaController::class);
Route::resource('cetak_mahasiswa', CetakMahasiswaController::class);

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

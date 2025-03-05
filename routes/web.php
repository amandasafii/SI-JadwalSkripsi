<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\LoginController;
use App\HTTP\Controllers\LoginAdminController;
use App\HTTP\Controllers\LoginDosenController;
use App\HTTP\Controllers\DashboardDosenController;
// use App\HTTP\Controllers\DashboardAdminController;
// use App\HTTP\Controllers\DashboardMahasiswaController;
use App\HTTP\Controllers\MahasiswaDosenController;
use App\HTTP\Controllers\DosenDosenController;
// use App\HTTP\Controllers\PengujiDosenController;
// use App\HTTP\Controllers\JadwalDosenController;
use App\HTTP\Controllers\RuanganDosenController;
use App\HTTP\Controllers\CetakDosenController;
use App\HTTP\Controllers\LogoutDosenController;
use App\HTTP\Controllers\EditDashadminController;
use App\HTTP\Controllers\MahasiswaAdminController;
use App\HTTP\Controllers\EditMhsadminController;
use App\HTTP\Controllers\DashboardMahasiswaController;
use App\HTTP\Controllers\LoginMahasiswaController;
use App\HTTP\Controllers\DashboardAdminController;
use App\HTTP\Controllers\TambahMahasiswaController;
use App\HTTP\Controllers\DosenAdminController;
use App\HTTP\Controllers\EditDosenadminController;
use App\HTTP\Controllers\TambahDosenadminController;
use App\HTTP\Controllers\CetakAdminController;
use App\HTTP\Controllers\EditCetakadminController;
use App\HTTP\Controllers\RuanganAdminController;
use App\HTTP\Controllers\TambahRuanganadminController;
use App\HTTP\Controllers\EditRuanganadminController;

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


Route::get('/dashboard_dosen', function () {
    return view('dashboard_dosen');
});


// Route::get('/manda', function () {
//     return view('login');
// });

  Route::resource('login', LoginController::class);
  Route::resource('login_admin', LoginAdminController::class);
  Route::resource('login_dosen', LoginDosenController::class);
  Route::resource('login_mahasiswa', LoginMahasiswaController::class);
  Route::resource('dashboard_dosen', DashboardDosenController::class);
//   Route::resource('dashboard_dosen', DashboardMahasiswaController::class);
  Route::resource('mahasiswa_dosen', MahasiswaDosenController::class);
  Route::resource('dosen_dosen', DosenDosenController::class);
  Route::resource('penguji_dosen', PengujiDosenController::class);
  Route::resource('jadwal_dosen', JadwalDosenController::class);
  Route::resource('ruangan_dosen', RuanganDosenController::class);
  Route::resource('cetak_dosen', CetakDosenController::class);
  Route::resource('logout_dosen', LogoutDosenController::class);
  Route::resource('dashboard_admin', DashboardAdminController::class);
  Route::resource('edit_dashadmin', EditDashadminController::class);
  Route::resource('mahasiswa_admin', MahasiswaAdminController::class);
  Route::resource('edit_mhsadmin', EditMhsadminController::class);
  Route::resource('dashboard_mahasiswa', DashboardMahasiswaController::class);
  Route::resource('tambah_mahasiswa', TambahMahasiswaController::class);
  Route::resource('dosen_admin', DosenAdminController::class);
  Route::resource('edit_dosenadmin', EditDosenadminController::class);
  Route::resource('tambah_dosenadmin', TambahDosenadminController::class);
  Route::resource('cetak_admin', CetakAdminController::class);
  Route::resource('edit_cetakadmin', EditCetakadminController::class);
  Route::resource('ruangan_admin', RuanganAdminController::class);
  Route::resource('tambah_ruanganadmin', TambahRuanganadminController::class);
  Route::resource('edit_ruanganadmin', EditRuanganadminController::class);
  
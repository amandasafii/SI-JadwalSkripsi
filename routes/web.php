<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\LoginController;
use App\HTTP\Controllers\LoginAdminController;
use App\HTTP\Controllers\LoginDosenController;
use App\HTTP\Controllers\DashboardDosenController;
use App\HTTP\Controllers\DashboardMahasiswaController;
use App\HTTP\Controllers\MahasiswaDosenController;
use App\HTTP\Controllers\DosenDosenController;
use App\HTTP\Controllers\PengujiDosenController;
use App\HTTP\Controllers\JadwalDosenController;
use App\HTTP\Controllers\RuanganDosenController;
use App\HTTP\Controllers\CetakDosenController;
use App\HTTP\Controllers\LogoutDosenController;

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

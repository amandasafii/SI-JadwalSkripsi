# 📌 Panduan Pemasangan Laravel & Menghubungkan Backend dengan Frontend via Postman

## 🚀 1. Instalasi Laravel
1. Pastikan **Composer** sudah terinstal: `composer -V` ✅
2. Buat proyek Laravel baru:
   ```sh
   composer create-project --prefer-dist laravel/laravel nama_proyek
   ```
3. Masuk ke folder proyek:
   ```sh
   cd nama_proyek
   ```
4. Jalankan server lokal:
   ```sh
   php artisan serve
   ``` 🏃‍♂️

## 🛠 2. Konfigurasi Database
1. Edit file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
   ```
2. Jalankan migrasi database:
   ```sh
   php artisan migrate
   ``` ✅

## 🔗 3. Membuat API Endpoint
1. Buat controller API:
   ```sh
   php artisan make:controller MahasiswaController --api
   ``` 📁
2. Edit `routes/api.php`:
   ```php
   use App\Http\Controllers\MahasiswaController;
   
   Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
   ```
3. Implementasi `MahasiswaController.php`:
   ```php
   namespace App\Http\Controllers;
   use Illuminate\Http\Request;
   use App\Models\Mahasiswa;
   
   class MahasiswaController extends Controller {
       public function index() {
           return response()->json(Mahasiswa::all());
       }
   }
   ``` ✅

## 🧪 4. Menguji API dengan Postman
1. Buka **Postman** 📬
2. Gunakan metode `GET`
3. Masukkan URL API:
   ```
   http://127.0.0.1:8000/api/mahasiswa
   ```
4. Klik **Send**, data mahasiswa akan muncul 🖥

## 🌐 5. Menghubungkan ke Frontend
Untuk mengambil data dari backend Laravel, gunakan **HTTP client** seperti `Http::get()` di Laravel.

**Contoh Request dari Laravel ke Backend:**
```php
use Illuminate\Support\Facades\Http;

$response = Http::get('http://localhost:8080/api/ruangan/');
```

🎉 **Selesai!** Sekarang backend Laravel sudah terhubung dan bisa diuji dengan Postman. 🚀


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    .select2-container .select2-selection--single {
        height: 2.5rem;
        padding: 0.5rem 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 1rem;
        display: flex;
        align-items: center;
        background-color: #fff;
    }

    .select2-selection__rendered {
        color: #111827;
        padding-left: 0;
        */ padding-right: 0;
        line-height: 1.25rem;
        display: flex;
        align-items: center;
    }

    .select2-selection__arrow {
        height: 2.5rem !important;
        top: 0.25rem;
        right: 0.75rem;
    }

    .select2-container--open .select2-selection--single {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
    }

    .select2-results__option {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
    }

    .select2-results__option--highlighted {
        background-color: #e0f2fe;
        color: #1e40af;
    }
</style>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_admin" class="block py-2 px-4 mb-2">🏠 Dashboard</a>
                    <a href="/mahasiswa_admin" class="block py-2 px-4 mb-2">🎓 Mahasiswa</a>
                    <a href="/dosen_admin"
                        class="block py-2 px-4 mb-2 text-gray-700 font-bold bg-gray-300 rounded">👩‍🏫 Dosen</a>
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/jadwal_admin" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a>
                    <a href="/penguji_admin" class="block py-2 px-4 mb-2">🧑‍⚖️ Penguji Sidang</a>
                </nav>
            </div>
            <button id="logoutButton" class="block py-2 px-4 text-black rounded font-bold text-left w-full">⬅ Log
                Out</button>
        </div>


        <!-- Content -->
        <div class="flex-1 p-6 flex flex-col items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-center text-xl font-bold">Tambah Data Dosen</h2>
                <h3 class="text-center text-lg font-semibold mb-4">Skripsi Online</h3>

                @if ($errors->any())
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                html: `{!! implode('<br>', $errors->all()) !!}`,
                                confirmButtonColor: '#e3342f'
                            });
                        });
                    </script>
                @endif

                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: '{{ session('success') }}',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });
                    </script>
                @endif

                <form action="{{ url('/dosen_admin') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1">NIDN :</label>
                        <input type="number" name='nidn' class="w-full border p-2 rounded"
                            value="{{ old('nidn') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Nama Dosen :</label>
                        <input type="text" name='nama_dosen' class="w-full border p-2 rounded"
                            value="{{ old('nama_dosen') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Program Studi :</label>
                        <select id="program_studi" select name="program_studi" class="select2 w-full">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="D3 Teknik Elektronika"
                                {{ old('program_studi') == 'D3 Teknik Elektronika' ? 'selected' : '' }}>D3 Teknik
                                Elektronika</option>
                            <option value="D3 Teknik Listrik"
                                {{ old('program_studi') == 'D3 Teknik Listrik' ? 'selected' : '' }}>D3 Teknik Listrik
                            </option>
                            </option>
                            <option value="D3 Teknik Informatika"
                                {{ old('program_studi') == 'D3 Teknik Informatika' ? 'selected' : '' }}>D3 Teknik
                                Informatika</option>
                            <option value="D3 Teknik Mesin"
                                {{ old('program_studi') == 'D3 Teknik Mesin' ? 'selected' : '' }}>D3 Teknik Mesin
                            </option>
                            <option value="D4 Teknik Pengendalian Pencemaran Lingkungan"
                                {{ old('program_studi') == 'D4 Teknik Pengendalian Pencemaran Lingkungan' ? 'selected' : '' }}>
                                D4 Teknik Pengendalian Pencemaran Lingkungan</option>
                            <option value="D4 Pengembangan Produk Agroindustri"
                                {{ old('program_studi') == 'D4 Pengembangan Produk Agroindustri' ? 'selected' : '' }}>D4
                                Pengembangan Produk Agroindustri</option>
                            <option value="D4 Teknologi Rekayasa Energi Terbarukan"
                                {{ old('program_studi') == 'D4 Teknologi Rekayasa Energi Terbarukan' ? 'selected' : '' }}>
                                D4 Teknologi Rekayasa Energi Terbarukan</option>
                            <option value="D4 Rekayasa Kimia Industri"
                                {{ old('program_studi') == 'D4 Rekayasa Kimia Industri' ? 'selected' : '' }}>
                                D4 Rekayasa Kimia Industri</option>
                            <option value="D4 Teknologi Rekayasa Mekatronika"
                                {{ old('program_studi') == 'D4 Teknologi Rekayasa Mekatronika' ? 'selected' : '' }}>
                                D4 Teknologi Rekayasa Mekatronika</option>
                            <option value="D4 Rekayasa Keamanan Siber"
                                {{ old('program_studi') == 'D4 Rekayasa Keamanan Siber' ? 'selected' : '' }}>
                                D4 Rekayasa Keamanan Siber</option>
                            <option value="D4 Teknologi Rekayasa Multimedia"
                                {{ old('program_studi') == 'D4 Teknologi Rekayasa Multimedia' ? 'selected' : '' }}>
                                D4 Teknologi Rekayasa Multimedia</option>
                            <option value="D4 Akuntansi Lembaga Keuangan Syariah"
                                {{ old('program_studi') == 'D4 Akuntansi Lembaga Keuangan Syariah' ? 'selected' : '' }}>
                                D4 Akuntansi Lembaga Keuangan Syariah</option>
                            <option value="D4 Teknologi Rekayasa Multimedia"
                                {{ old('program_studi') == 'D4 Teknologi Rekayasa Multimedia' ? 'selected' : '' }}>
                                D4 Teknologi Rekayasa Multimedia</option>
                            <option value="D4 Rekayasa Perangkat Lunak"
                                {{ old('program_studi') == 'D4 Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                                D4 Rekayasa Perangkat Lunak</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Email :</label>
                        <input type="email" name='email' class="w-full border p-2 rounded"
                            value="{{ old('email') }}">
                    </div>
                    <div class="flex justify-end gap-4 mt-4">
                        <a href="/dosen_admin" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded">←
                            Kembali</a>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#program_studi').select2({
            placeholder: '-- Pilih Program Studi --',
            allowClear: true
        });
        $(document).on('mouseleave', '.select2-results__option', function() {
            $(this).removeClass('select2-results__option--highlighted');
        });
    });

    document.getElementById('logoutButton').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Keluar dari sistem?',
            text: "Anda akan keluar dari aplikasi.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/logout";
            }
        });
    });
</script>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penguji Sidang</title>
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
                    <a href="/dosen_admin" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/jadwal_admin" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a>
                    <a href="/penguji_admin"
                        class="block py-2 px-4 mb-2 text-gray-700 font-bold bg-gray-300 rounded">🧑‍⚖️ Penguji
                        Sidang</a>
                </nav>
            </div>
            <button id="logoutButton" class="block py-2 px-4 text-black rounded font-bold text-left w-full">⬅ Log
                Out</button>
        </div>


        <!-- Content -->
        <div class="flex-1 p-6 flex flex-col items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-center text-xl font-bold">Tambah Data Penguji Sidang</h2>
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

                <form action="{{ url('/penguji_admin') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1">Jadwal :</label>
                        <select id="id_jadwal" name="id_jadwal" class="select2 w-full">
                            <option value="">-- Pilih Id Jadwal --</option>
                            @foreach ($jadwal as $jd)
                                <option value="{{ $jd['id_jadwal'] }}"
                                    {{ old('id_jadwal') == $jd['id_jadwal'] ? 'selected' : '' }}>
                                    {{ $jd['id_jadwal'] }} - {{ $jd['npm'] ?? '' }}
                                </option>
                            @endforeach
                        </select>

                        <div class="mb-4">
                            <label class="block mb-1">NIDN :</label>
                            <select id="nidn" name="nidn" class="select2 w-full">
                                <option value="">-- Pilih NIDN Dosen --</option>
                                @foreach ($dosen as $dsn)
                                    <option value="{{ $dsn['nidn'] }}"
                                        {{ old('nidn') == $dsn['nidn'] ? 'selected' : '' }}>
                                        {{ $dsn['nidn'] }} - {{ $dsn['nama_dosen'] ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Peran :</label>
                            <select id="peran" name="peran" class="select2 w-full">
                                <option value="">-- Pilih Peran --</option>
                                @foreach ($peran as $p)
                                    <option value="{{ $p['peran'] }}"
                                        {{ (old('peran') ?? ($data['peran'] ?? '')) == $p['peran'] ? 'selected' : '' }}>
                                        {{ $p['peran'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end gap-4 mt-4">
                            <a href="/penguji_admin"
                                class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded">←
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
        $('#id_jadwal').select2({
            placeholder: '-- Pilih Id Jadwal --',
            allowClear: true
        });

        $('#nidn').select2({
            placeholder: '-- Pilih NIDN Dosen --',
            allowClear: true
        });

        $('#peran').select2({
            placeholder: '-- Pilih Peran --',
            allowClear: true
        });
    });
    $(document).on('mouseleave', '.select2-results__option', function() {
        $(this).removeClass('select2-results__option--highlighted');
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
            confirmButtonText: 'Ya, keluar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/logout';
            }
        });
    });
</script>

</html>

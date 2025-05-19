<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

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
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2 text-gray-700 font-bold bg-gray-300 rounded">🏢
                        Ruangan</a>
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
                <h2 class="text-center text-xl font-bold">Tambah Data Ruangan</h2>
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
                <form action="{{ url('/ruangan_admin') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1">Kode Ruangan :</label>
                        <input type="text" name='kode_ruangan' class="w-full border p-2 rounded"
                            value="{{ isset($data['kode_ruangan']) ? $data['kode_ruangan'] : old('kode_ruangan') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Nama Ruangan :</label>
                        <input type="text" name='nama_ruangan' class="w-full border p-2 rounded"
                            value="{{ isset($data['nama_ruangan']) ? $data['nama_ruangan'] : old('nama_ruangan') }}">
                    </div>
                    <div class="flex justify-end gap-4 mt-4">
                        <a href="/ruangan_admin" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded">←
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

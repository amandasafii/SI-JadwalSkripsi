<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Data Ruangan</title>
</head>

<body class="bg-gray-100 flex">
    <div class="flex h-screen w-full">
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

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <div class="max-w-7xl w-full mx-auto bg-white shadow-lg rounded-lg p-6">
                <!-- Judul dan Baris Kontrol -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Data Ruangan</h2>
                        <a href="/ruangan_admin/create"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">+
                            Tambah Data</a>
                    </div>

                    <!-- Form Pencarian -->
                    <form action="{{ url('/ruangan_admin') }}" method="GET" class="w-full md:w-auto">
                        <input type="text" name="search" placeholder="Cari Kode ruangan / Nama ruanngan"
                            value="{{ request('search') }}"
                            class="border border-gray-300 rounded px-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
                    </form>
                </div>

                <!-- SweetAlert2 Message -->
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

                @if (session('error'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: '{{ session('error') }}',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });
                    </script>
                @endif

                <!-- Membuat tabel responsif -->
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 p-2">No</th>
                                <th class="border border-gray-400 px-4 py-2">Kode Ruangan</th>
                                <th class="border border-gray-400 px-4 py-2">Nama Ruangan</th>
                                <th class="border border-gray-400 px-4 py-2 w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="bg-white">
                                    <td class="border border-gray-400 p-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item['kode_ruangan'] }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item['nama_ruangan'] }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-center w-24">
                                        <a href="{{ url('ruangan_admin/' . $item['kode_ruangan']) }}/edit"
                                            class="text-blue-500 hover:text-blue-700 px-2">✏️</a>|
                                        <form id="delete-form-{{ $item['kode_ruangan'] }}"
                                            action="{{ url('ruangan_admin/' . $item['kode_ruangan']) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                onclick="confirmDelete('{{ $item['kode_ruangan'] }}')"
                                                class="text-red-500 hover:text-red-700 px-2">🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(kode_ruangan) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + kode_ruangan).submit();
                }
            });
        }

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
</body>

</html>

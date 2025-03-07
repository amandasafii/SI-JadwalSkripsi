<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Mahasiswa</title>
</head>
<body class="bg-gray-100 flex">
    <div class="flex h-screen w-full">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_admin" class="block py-2 px-4 bg-gray-300 rounded mb-2">🏠 Dashboard</a>
                    <a href="/mahasiswa_admin" class="block py-2 px-4 mb-2 text-gray-700 font-bold">🎓 Mahasiswa</a>
                    <a href="/dosen_admin" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/cetak_admin" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout_dosen" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <div class="max-w-7xl w-full mx-auto bg-white shadow-lg rounded-lg p-6">
                <!-- Judul dan Tombol -->
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Data Mahasiswa</h2>
                <a href="/tambah_mahasiswa" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">+ Tambah Data</a>

                <!-- Membuat tabel responsif -->
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 p-2">NPM</th>
                                <th class="border border-gray-400 p-2">Nama Mahasiswa</th>
                                <th class="border border-gray-400 p-2">Prodi</th>
                                <th class="border border-gray-400 p-2">Judul Skripsi</th>
                                <th class="border border-gray-400 p-2">Email</th>
                                <th class="border border-gray-400 p-2 w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $m)
                                <tr>
                                    <td class="border border-gray-400 p-2">{{ $m['npm'] }}</td>
                                    <td class="border border-gray-400 p-2">{{ $m['nama_mahasiswa'] }}</td>
                                    <td class="border border-gray-400 p-2">{{ $m['program_studi'] }}</td>
                                    <td class="border border-gray-400 p-2">{{ $m['judul_skripsi'] }}</td>
                                    <td class="border border-gray-400 p-2">{{ $m['email'] }}</td>
                                    <td class="border border-gray-400 p-2 text-center w-24">
                                        <a href="/edit_mhsadmin" class="text-blue-500 hover:text-blue-700 px-2">✏️</a> |
                                        <a href="/hapus_mahasiswa/1" class="text-red-500 hover:text-red-700 px-2">🗑️</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>

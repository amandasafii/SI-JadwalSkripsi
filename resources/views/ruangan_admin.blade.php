<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Ruangan</title>
</head>
<body class="bg-gray-100 flex">
    <div class="flex h-screen w-full">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_admin" class="block py-2 px-4 bg-gray-300 rounded mb-2">🏠 Dashboard</a>
                    <a href="/mahasiswa_admin" class="block py-2 px-4 mb-2">🎓 Mahasiswa</a>
                    <a href="/dosen_admin" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2 text-gray-700 font-bold">🏢 Ruangan</a>
                    <a href="/cetak_admin" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout_dosen" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <div class="max-w-7xl w-full mx-auto bg-white shadow-lg rounded-lg p-6">  
                <!-- Judul dan Tombol -->
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Data Ruangan</h2>
                <a href="/tambah_ruanganadmin" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">+ Tambah Data</a>

                <!-- Membuat tabel responsif -->
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 px-4 py-2">Kode Ruangan</th>
                                <th class="border border-gray-400 px-4 py-2">Nama Ruangan</th>
                                <th class="border border-gray-400 px-4 py-2 w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangan as $r)
                            <tr class="bg-white">
                                <td class="border border-gray-400 px-4 py-2">{{ $r['kode_ruangan'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $r['nama_ruangan'] }}</td>
                                <td class="border border-gray-400 px-4 py-2 text-center w-24">
                                    <a href="/edit_ruanganadmin" class="text-blue-500 hover:text-blue-700 px-2">✏️</a> |
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

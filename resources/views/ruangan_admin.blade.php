<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Ruangan</title>
</head>
<body class="bg-gray-100 flex">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_admin" class="block py-2 px-4 bg-gray-300 rounded mb-2">🏠 Dashboard</a>
                    <a href="/mahasiswa_admin" class="block py-2 px-4 mb-2 text-gray-700 font-bold">🎓 Mahasiswa</a>
                    <a href="/dosen_admin" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    {{-- <a href="/penguji_dosen" class="block py-2 px-4 mb-2">🧑‍⚖️ Penguji Sidang</a>
                    <a href="/jadwal_dosen" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a> --}}
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/cetak_admin" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout_dosen" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>

        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Data Ruangan</h2>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">ID Ruangan</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Ruangan</th>
                                <th class="border border-gray-300 px-4 py-2">Lokasi</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white">
                                <td class="border border-gray-300 px-4 py-2">83112</td>
                                <td class="border border-gray-300 px-4 py-2">J.9.0</td>
                                <td class="border border-gray-300 px-4 py-2">GTIL Lantai 9</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <a href="/edit_ruanganadmin" class="text-blue-500 hover:text-blue-700 px-2">✏️ Edit</a>
                                    <a href="/hapus_mahasiswa/1" class="text-red-500 hover:text-red-700 px-2">🗑️ Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-right">
                    <a href="/tambah_ruanganadmin" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

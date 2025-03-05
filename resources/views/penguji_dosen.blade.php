<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penguji</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_dosen" class="block py-2 px-4 bg-gray-300 rounded mb-2">🏠 Dashboard</a>
                    <a href="/mahasiswa_dosen" class="block py-2 px-4 mb-2">🎓 Mahasiswa</a>
                    <a href="/dosen_dosen" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    <a href="/penguji_dosen" class="block py-2 px-4 mb-2">🧑‍⚖️ Penguji Sidang</a>
                    <a href="/jadwal_dosen" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a>
                    <a href="/ruangan_dosen" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/cetak_dosen" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout_dosen" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold">Data Penguji</h1>
                <div class="relative">
                    <input type="text" placeholder="Cari nama mahasiswa" class="border p-2 rounded w-64">
                    <button class="absolute right-2 top-2 text-gray-500">🔍</button>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white p-4 rounded shadow">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                           
                            <th class="border p-2">ID Penguji</th>
                            <th class="border p-2">ID Jadwal</th>
                            <th class="border p-2">NIDN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-2">1</td>
                            <td class="border p-2">12345678</td>
                            <td class="border p-2">6543</td>
                            
                        </tr>
                        <!-- Tambahkan data lain di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

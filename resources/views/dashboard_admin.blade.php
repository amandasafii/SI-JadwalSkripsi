<?php
session_start();

if (isset($_POST['hapus'])) {
    // Proses hapus semua data (Pastikan hapus.php menangani penghapusan di database)
    header("Location: hapus.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_admin" class="block py-2 px-4 bg-gray-300 rounded mb-2">🏠 Dashboard</a>
                    <a href="/mahasiswa_admin" class="block py-2 px-4 mb-2">🎓 Mahasiswa</a>
                    <a href="/dosen_admin" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/cetak_admin" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout_dosen" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Cari data sidang" class="border px-3 py-1 rounded">
                    <span>🔍</span>
                    <span class="font-bold">Hi, Amanda ! 👤</span>
                </div>
            </div>

            <div class="bg-white p-4 mt-5 rounded shadow">
                <h3 class="text-lg font-bold">Sidang Hari Ini</h3>
                <p>Amanda Dwi Safitri</p>
                <p>3 Maret 2025</p>
                <p>07.00 - 09.30</p>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-5">
                <div class="bg-white p-4 rounded shadow">
                    <h4 class="font-bold">Jumlah peserta sidang</h4>
                    <p class="text-2xl font-bold">32</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h4 class="font-bold">Jumlah peserta sidang hari ini</h4>
                    <p class="text-2xl font-bold">6</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h4 class="font-bold">Sisa peserta sidang</h4>
                    <p class="text-2xl font-bold">1</p>
                </div>
            </div>

            <!-- Tombol Edit dan Hapus -->
            <div class="mt-5 flex space-x-3">
                <a href="/edit_dashadmin" class="px-4 py-2 bg-blue-500 text-white rounded">✏ Edit Data</a>
                <form method="post">
                    <button type="submit" name="hapus" class="px-4 py-2 bg-red-500 text-white rounded">🗑 Hapus Data</button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>

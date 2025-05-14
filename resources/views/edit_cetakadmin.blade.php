<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cetak</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <a href="/dosen_dosen" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    {{-- <a href="/penguji_dosen" class="block py-2 px-4 mb-2">🧑‍⚖️ Penguji Sidang</a>
                    <a href="/jadwal_dosen" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a> --}}
                    <a href="/ruangan_dosen" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/cetak_admin" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout_dosen" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>


        <!-- Content -->
        <div class="flex-1 p-6 flex flex-col items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-center text-xl font-bold">Edit Cetak</h2>
                <h3 class="text-center text-lg font-semibold mb-4">Jadwal Skripsi Online</h3>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="block mb-1">NPM :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Nama Mahasiswa :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Prodi :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Waktu Sidang :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Nama Ruangan :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    {{-- <div class="mb-4">
                        <label class="block mb-1">Lokasi :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div> --}}
                    <div class="mb-4">
                        <label class="block mb-1">Dosen Penguji :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
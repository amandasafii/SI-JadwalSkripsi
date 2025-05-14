<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
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
                    <a href="/dosen_admin" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    {{-- <a href="/penguji_dosen" class="block py-2 px-4 mb-2">🧑‍⚖️ Penguji Sidang</a>
                    <a href="/jadwal_dosen" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a> --}}
                    <a href="/ruangan_admin" class="block py-2 px-4 mb-2">🏢 Ruangan</a>
                    <a href="/cetak_admin" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout_dosen" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>


        <!-- Content -->
        <div class="flex-1 p-6 flex flex-col items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-center text-xl font-bold">Edit Data Mahasiswa</h2>
                <h3 class="text-center text-lg font-semibold mb-4">Skripsi Online</h3>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="block mb-1">NPM :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Nama :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Prodi :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Judul Skripsi :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Email :</label>
                        <input type="text" class="w-full border p-2 rounded">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <tbody>
        @foreach ($admin as $m)
            <tr>
                <td class="border border-gray-400 p-2">{{ $m['npm'] }}</td>
                <td class="border border-gray-400 p-2">{{ $m['nama_mahasiswa'] }}</td>
                <td class="border border-gray-400 p-2">{{ $m['program_studi'] }}</td>
                <td class="border border-gray-400 p-2">{{ $m['judul_skripsi'] }}</td>
                <td class="border border-gray-400 p-2">{{ $m['email'] }}</td>
                {{-- <td class="border border-gray-400 p-2 text-center w-24">
                    <a href="/edit_mhsadmin" class="text-blue-500 hover:text-blue-700 px-2">✏️</a> |
                    <a href="/hapus_mahasiswa/1" class="text-red-500 hover:text-red-700 px-2">🗑️</a>
                </td> --}}
            {{-- </tr>
        @endforeach
    </tbody> --}}
</body>
</html>
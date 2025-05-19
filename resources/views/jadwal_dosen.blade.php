<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_dosen" class="block py-2 px-4 mb-2">🏠 Dashboard</a>
                    {{-- <a href="/mahasiswa_dosen" class="block py-2 px-4 mb-2">🎓 Mahasiswa</a> --}}
                    {{-- <a href="/dosen_dosen" class="block py-2 px-4 mb-2">👩‍🏫 Dosen</a>
                    <a href="/penguji_dosen" class="block py-2 px-4 mb-2">🧑‍⚖️ Penguji Sidang</a>
                    <a href="/jadwal_dosen" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a>
                    <a href="/ruangan_dosen" class="block py-2 px-4 mb-2">🏢 Ruangan</a> --}}
                    <a href="/penguji_dosen" class="block py-2 px-4 mb-2 text-gray-700 font-bold bg-gray-300 rounded">🧑‍⚖️ Penguji Sidang</a>
                    <a href="/cetak_dosen" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <a href="/logout" class="block py-2 px-4 text-black rounded font-bold">⬅ Log Out</a>
        </div>


        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <div class="max-w-7xl w-full mx-auto bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Penguji Sidang</h2>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-full border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Dosen</th>
                                <th class="border border-gray-300 px-4 py-2">Peran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="border">
                                    <td class="border border-gray-300 px-4 p-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 p-2">{{ $item['nama_dosen'] }}</td>
                                    <td class="border border-gray-300 px-4 p-2">{{ $item['peran'] }}</td>
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
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal</title>
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
                    <a href="/dashboard_mahasiswa" class="block py-2 px-4 mb-2">🏠 Dashboard</a>
                    <a href="/jadwal_mahasiswa" class="block py-2 px-4 mb-2 text-gray-700 font-bold bg-gray-300 rounded">📅 Jadwal Sidang</a>
                    <a href="/cetak_mahasiswa" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <button id="logoutButton" class="block py-2 px-4 text-black rounded font-bold text-left w-full">⬅ Log
                Out</button>
        </div>


        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <div class="max-w-7xl w-full mx-auto bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Jadwal Sidang</h2>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Mahasiswa</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Ruangan</th>
                                <th class="border border-gray-300 px-4 py-2">Waktu Sidang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="border">
                                    <td class="border border-gray-300 px-4 p-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 p-2">{{ $item['nama_mahasiswa'] }}</td>
                                    <td class="border border-gray-300 px-4 p-2">{{ $item['nama_ruangan'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $item['waktu_sidang'] }}</td>
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

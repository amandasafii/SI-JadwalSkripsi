<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Cetak Data</title>
</head>

<body class="bg-gray-100 flex">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_dosen" class="block py-2 px-4 mb-2">🏠 Dashboard</a>
                    <a href="/penguji_dosen" class="block py-2 px-4 mb-2">🧑‍⚖️ Penguji Sidang</a>
                    <a href="/cetak_dosen" class="block py-2 px-4 mb-2 text-gray-700 font-bold bg-gray-300 rounded">🖨
                        Cetak</a>
                </nav>
            </div>
            <button id="logoutButton" class="block py-2 px-4 text-black rounded font-bold text-left w-full">⬅ Log
                Out</button>
        </div>


        <!-- Main Content -->
        <div class="flex-1 p-6 flex flex-col">
            <div class="max-w-7xl w-full mx-auto bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Penjadwalan Sidang</h2>
                <div class="overflow-auto">
                    <table class="w-full min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">NPM</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Mahasiswa</th>
                                <th class="border border-gray-300 px-4 py-2">Prodi</th>
                                <th class="border border-gray-300 px-4 py-2">Waktu Sidang</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Ruangan</th>
                                <th class="border border-gray-300 px-4 py-2">Dosen Penguji</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($view_penjadwalan['data'] as $d)
                                <tr class="border">
                                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border p-2">{{ $d['npm'] }}</td>
                                    <td class="border p-2">{{ $d['nama_mahasiswa'] }}</td>
                                    <td class="border p-2">{{ $d['program_studi'] }}</td>
                                    <td class="border p-2">{{ $d['waktu_sidang'] }}</td>
                                    <td class="border p-2">{{ $d['nama_ruangan'] }}</td>
                                    <td class="border p-2">{{ $d['dosen_penguji'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="mt-4 text-right">
                    <button onclick="window.print()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">🖨 Cetak</button>
                </div> --}}
                <a href="{{ route('cetak_dosen') }}" 
   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
   🧾 Download PDF
</a>

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

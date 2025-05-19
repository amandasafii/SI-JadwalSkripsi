<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-200 p-5 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold">Sistem Informasi Skripsi Online</h1>
                <nav class="mt-5">
                    <a href="/dashboard_mahasiswa"
                        class="block py-2 px-4 mb-2 text-gray-700 font-bold bg-gray-300 rounded">🏠 Dashboard</a>
                    <a href="/jadwal_mahasiswa" class="block py-2 px-4 mb-2">📅 Jadwal Sidang</a>
                    <a href="/cetak_mahasiswa" class="block py-2 px-4 mb-2">🖨 Cetak</a>
                </nav>
            </div>
            <button id="logoutButton" class="block py-2 px-4 text-black rounded font-bold text-left w-full">⬅ Log
                Out</button>
        </div>



        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Dashboard</h2>
                <div class="flex items-center space-x-4">
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

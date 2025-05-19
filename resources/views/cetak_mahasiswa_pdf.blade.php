<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .data {
            margin-top: 20px;
        }

        .data p {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <div class="data">
        <p><strong>NPM:</strong> {{ $mahasiswa['npm'] }}</p>
        <p><strong>Nama:</strong> {{ $mahasiswa['nama_mahasiswa'] }}</p>
        <p><strong>Program Studi:</strong> {{ $mahasiswa['program_studi'] }}</p>
        <p><strong>Waktu Sidang:</strong> {{ $mahasiswa['waktu_sidang'] }}</p>
        <p><strong>Ruangan:</strong> {{ $mahasiswa['nama_ruangan'] }}</p>
        <p><strong>Dosen Penguji:</strong> {{ $mahasiswa['dosen_penguji'] }}</p>
    </div>
</body>
</html>

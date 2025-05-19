<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Sidang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Data Jadwal Sidang Dosen</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Waktu Sidang</th>
                <th>Ruangan</th>
                <th>Dosen Penguji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($view_penjadwalan['data'] as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d['npm'] }}</td>
                <td>{{ $d['nama_mahasiswa'] }}</td>
                <td>{{ $d['program_studi'] }}</td>
                <td>{{ $d['waktu_sidang'] }}</td>
                <td>{{ $d['nama_ruangan'] }}</td>
                <td>{{ $d['dosen_penguji'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

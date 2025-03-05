<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Skripsi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3d3d3;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .login-options {
            display: flex;
            gap: 20px;
        }
        .login-btn {
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: bold;
            width: 120px;
            padding: 20px;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
        }
        .login-btn img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }
        .login-btn:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>SKRIPSI</h1>
    <p>Silahkan Login Terlebih Dahulu</p>

    <div class="login-options">
        <a href="/login_admin" class="login-btn">
            <img src="admin.png" alt="Admin">
            Admin
        </a>
        <a href="/login_dosen" class="login-btn">
            <img src="dosen.png" alt="Dosen">
            Dosen
        </a>
        <a href="/login_mahasiswa" class="login-btn">
            <img src="mahasiswa.png" alt="Mahasiswa">
            Mahasiswa
        </a>
    </div>
</div>

</body>
</html>

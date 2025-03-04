<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8f8f8;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .login-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            text-align: left;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>SKRIPSI</h1>
        <div class="login-box">
            <form action="/dashboard_dosen" method="GET">
                
                {{-- <label><i class="fas fa-user"></i> Nama</label>
                <input type="text" placeholder="Masukkan nama anda" required>

                <label><i class="fas fa-id-badge"></i> ID User</label>
                <input type="text" placeholder="Masukkan user ID anda" required> --}}

                <label><i class="fas fa-user"></i> Username</label>
                <input type="text" placeholder="Masukkan username anda" required>

                {{-- <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" placeholder="Masukkan email anda" required> --}}

                <label><i class="fas fa-lock"></i> Password</label>
                <input type="password" placeholder="Masukkan password anda" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>

</body>
</html>

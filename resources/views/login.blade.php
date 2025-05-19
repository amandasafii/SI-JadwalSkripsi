<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Skripsi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-enter {
            opacity: 0;
            transform: scale(0.95);
        }

        .fade-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: opacity 300ms ease, transform 300ms ease;
        }

        .fade-leave {
            opacity: 1;
            transform: scale(1);
        }

        .fade-leave-active {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 300ms ease, transform 300ms ease;
        }
    </style>
</head>

<body class="relative min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('3963601.jpg');">
    <div class="absolute inset-0 bg-black opacity-50 z-0"></div>

    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen text-white px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-4">SISTEM PENJADWALAN SIDANG SKRIPSI OTOMATIS</h1>
        <p class="text-lg mb-8 text-center">Silahkan Login Sesuai Peran Anda:</p>

        <!-- Flash Alert -->
        @if (session('error'))
            <div id="alertBox" class="bg-red-600 text-white px-4 py-3 rounded shadow mb-4 max-w-sm w-full text-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- Pilihan Role -->
        <div id="roleSelection" class="flex flex-wrap gap-6 justify-center mb-6 transition-all duration-300">
            <div onclick="showForm('Admin')"
                class="w-32 h-32 bg-white text-black rounded-lg shadow-md flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100">
                <img src="admin.png" alt="Admin" class="w-12 h-12 mb-2" />
                <span class="font-semibold">Admin</span>
            </div>
            <div onclick="showForm('Dosen')"
                class="w-32 h-32 bg-white text-black rounded-lg shadow-md flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100">
                <img src="dosen.png" alt="Dosen" class="w-12 h-12 mb-2" />
                <span class="font-semibold">Dosen</span>
            </div>
            <div onclick="showForm('Mahasiswa')"
                class="w-32 h-32 bg-white text-black rounded-lg shadow-md flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100">
                <img src="mahasiswa.png" alt="Mahasiswa" class="w-12 h-12 mb-2" />
                <span class="font-semibold">Mahasiswa</span>
            </div>
        </div>

        <!-- Form Login -->
        <div id="loginForm"
            class="hidden bg-white text-black rounded-lg shadow-lg p-6 w-full max-w-sm transition-all duration-300">
            <h2 id="formTitle" class="text-xl font-bold mb-4 text-center">Login</h2>
            <form id="formLogin" action="/login" method="POST" onsubmit="return validateForm()">
                @csrf
                <input type="hidden" name="role" id="roleInput" />

                <div class="mb-4">
                    <label for="username" class="block mb-1 font-medium">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required />
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-1 font-medium">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required />
                </div>

                <div class="flex justify-between gap-4 pt-2">
                    <button type="button" onclick="goBack()"
                        class="flex-1 bg-gray-500 text-white py-2 rounded hover:bg-gray-600 transition">Kembali</button>
                    <button type="submit"
                        class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const roleSelection = document.getElementById("roleSelection");
        const loginForm = document.getElementById("loginForm");

        function showForm(role) {
            roleSelection.classList.add("fade-leave", "fade-leave-active");
            setTimeout(() => {
                roleSelection.classList.add("hidden");
                roleSelection.classList.remove("fade-leave", "fade-leave-active");

                loginForm.classList.remove("hidden");
                loginForm.classList.add("fade-enter");
                setTimeout(() => {
                    loginForm.classList.add("fade-enter-active");
                }, 10);

                document.getElementById("formTitle").textContent = "Login " + role;
                document.getElementById("roleInput").value = role.toLowerCase();
            }, 300);
        }

        function goBack() {
            loginForm.classList.add("fade-leave", "fade-leave-active");
            setTimeout(() => {
                loginForm.classList.add("hidden");
                loginForm.classList.remove("fade-leave", "fade-leave-active");

                roleSelection.classList.remove("hidden");
                roleSelection.classList.add("fade-enter");
                setTimeout(() => {
                    roleSelection.classList.add("fade-enter-active");
                }, 10);
            }, 300);
        }

        function validateForm() {
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (!username || !password) {
                alert("Username dan password wajib diisi.");
                return false;
            }

            return true;
        }

        // Hapus alert setelah 3 detik
        const alertBox = document.getElementById("alertBox");
        if (alertBox) {
            setTimeout(() => {
                alertBox.remove();
            }, 3000);
        }
    </script>
</body>

</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role'     => 'required|in:admin,dosen,mahasiswa',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $role     = $request->input('role');

        // Cek ke database (tabel: users)
        $user = DB::table('user')
            ->where('username', $username)
            ->where('password', $password) // Pastikan ini plaintext
            ->where('role', $role)
            ->first();

        if ($user) {
            // Login berhasil, redirect ke dashboard sesuai role
            return redirect("/dashboard_{$role}");
        }

        // Gagal login
        return back()->with('error', 'Username, password, atau role salah.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $username = $request->username;
    $password = $request->password;
    $role = $request->role;

    // Cek user
    $user = DB::table('users') // ganti dengan nama tabel kamu kalau beda
        ->where('username', $username)
        ->where('password', $password)
        ->where('role', $role)
        ->first();

    if ($user) {
        // Simpan session
        Session::put('user', [
            'id' => $user->id_user,
            'username' => $user->username,
            'role' => $user->role,
        ]);

        // Redirect sesuai role
        if ($role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($role === 'dosen') {
            return redirect('/dosen/dashboard');
        } elseif ($role === 'mahasiswa') {
            return redirect('/mahasiswa/dashboard');
        }

        return redirect('/'); // fallback
    } else {
        return redirect('/login')->with('error', 'Username, password, atau role salah!');
    }
}

}

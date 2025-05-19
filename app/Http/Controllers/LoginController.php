<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,dosen,mahasiswa',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $role = $request->input('role');

        // Contoh login dummy (nanti ganti dengan Auth::attempt jika sudah ada database)
        // Misalnya: username = admin, password = admin123
        if ($username === $role && $password === '123') {
            // Redirect ke dashboard sesuai role
            return redirect("/dashboard_{$role}");
        }

        return back()->with('error', 'Username atau password salah.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login $login)
    {
        //
    }
}

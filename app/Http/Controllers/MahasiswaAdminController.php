<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('mahasiswa_admin');
        $response = Http::get('http://localhost:8080/api/mahasiswa');

        if ($response->successful()){
            $admin = $response->json();
            return view('mahasiswa_admin', compact('admin'));
        }else {
            return back()->with('error', 'Gagal mengambil data dosen');
        }
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
    public function show(mahasiswa_admin $mahasiwa_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa_admin $mahasiwa_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa_admin $mahasiwa_admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa_admin $mahasiwa_admin)
    {
        //
    }
}

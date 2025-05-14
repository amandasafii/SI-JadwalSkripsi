<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa_dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('mahasiswa_dosen');
        $response = Http::get('http://localhost:8080/mahasiswa');

        if ($response->successful()){
            $mahasiswa = $response->json();
            return view('mahasiswa_dosen', compact('mahasiswa'));
        }else {
            return back()->with('error', 'Gagal mengambil data mahasiswa');
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
    public function show(mahasiswa_dosen $mahasiswa_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa_dosen $mahasiswa_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa_dosen $mahasiswa_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa_dosen $mahasiswa_dosen)
    {
        //
    }
}

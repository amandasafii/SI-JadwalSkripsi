<?php

namespace App\Http\Controllers;

use App\Models\tambah_mahasiswa;
use Illuminate\Http\Request;

class TambahMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tambah_mahasiswa');
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
    public function show(tambah_mahasiswa $tambah_mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tambah_mahasiswa $tambah_mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tambah_mahasiswa $tambah_mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tambah_mahasiswa $tambah_mahasiswa)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\jadwal_dosen;
use Illuminate\Http\Request;

class JadwalDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jadwal_dosen');
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
    public function show(jadwal_dosen $jadwal_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal_dosen $jadwal_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jadwal_dosen $jadwal_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal_dosen $jadwal_dosen)
    {
        //
    }
}

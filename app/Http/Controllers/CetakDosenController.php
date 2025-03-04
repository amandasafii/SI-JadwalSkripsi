<?php

namespace App\Http\Controllers;

use App\Models\cetak_dosen;
use Illuminate\Http\Request;

class CetakDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cetak_dosen');
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
    public function show(cetak_dosen $cetak_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cetak_dosen $cetak_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cetak_dosen $cetak_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cetak_dosen $cetak_dosen)
    {
        //
    }
}

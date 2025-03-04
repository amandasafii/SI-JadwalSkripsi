<?php

namespace App\Http\Controllers;

use App\Models\ruangan_dosen;
use Illuminate\Http\Request;

class RuanganDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ruangan_dosen');
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
    public function show(ruangan_dosen $ruangan_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ruangan_dosen $ruangan_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ruangan_dosen $ruangan_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ruangan_dosen $ruangan_dosen)
    {
        //
    }
}

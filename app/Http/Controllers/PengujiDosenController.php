<?php

namespace App\Http\Controllers;

use App\Models\penguji_dosen;
use Illuminate\Http\Request;

class PengujiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('penguji_dosen');
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
    public function show(penguji_dosen $penguji_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penguji_dosen $penguji_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penguji_dosen $penguji_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penguji_dosen $penguji_dosen)
    {
        //
    }
}

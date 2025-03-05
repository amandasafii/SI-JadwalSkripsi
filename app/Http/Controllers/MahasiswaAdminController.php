<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa_admin;
use Illuminate\Http\Request;

class MahasiswaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa_admin');
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
    public function show(mahasiwa_admin $mahasiwa_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiwa_admin $mahasiwa_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiwa_admin $mahasiwa_admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiwa_admin $mahasiwa_admin)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\dashboard_mahasiswa;
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard_mahasiswa');
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
    public function show(dashboard_mahasiwa $dashboard_mahasiwa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboard_mahasiwa $dashboard_mahasiwa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboard_mahasiwa $dashboard_mahasiwa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboard_mahasiwa $dashboard_mahasiwa)
    {
        //
    }
}

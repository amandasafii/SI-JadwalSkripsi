<?php

namespace App\Http\Controllers;

use App\Models\dosen_admin;
use Illuminate\Http\Request;

class DosenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosen_admin');
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
    public function show(dosen_admin $dosen_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dosen_admin $dosen_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dosen_admin $dosen_admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dosen_admin $dosen_admin)
    {
        //
    }
}

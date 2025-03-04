<?php

namespace App\Http\Controllers;

use App\Models\logout_dosen;
use Illuminate\Http\Request;

class LogoutDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logout_dosen');
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
    public function show(logout_dosen $logout_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(logout_dosen $logout_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, logout_dosen $logout_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logout_dosen $logout_dosen)
    {
        //
    }
}
?>

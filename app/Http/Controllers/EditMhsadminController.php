<?php

namespace App\Http\Controllers;

use App\Models\edit_mhsadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EditMhsadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/api/mahasiswa');

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
    public function show(edit_mhsadmin $edit_mhsadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(edit_mhsadmin $edit_mhsadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, edit_mhsadmin $edit_mhsadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(edit_mhsadmin $edit_mhsadmin)
    {
        //
    }
}

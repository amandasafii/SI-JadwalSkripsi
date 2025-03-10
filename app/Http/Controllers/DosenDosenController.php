<?php

namespace App\Http\Controllers;

use App\Models\dosen_dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DosenDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dosen_dosen');

        $response = Http::get('http://localhost:8080/api/dosen');

        if ($response->successful()){
            $dosen = $response->json();
            return view('dosen_dosen', compact('dosen'));
        }else {
            return back()->with('error', 'Gagal mengambil data dosen');
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
    public function show(dosen_dosen $dosen_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dosen_dosen $dosen_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dosen_dosen $dosen_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dosen_dosen $dosen_dosen)
    {
        //
    }
}

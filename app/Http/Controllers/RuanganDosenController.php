<?php

namespace App\Http\Controllers;

use App\Models\ruangan_dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RuanganDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('ruangan_dosen');
        $response = Http::get('http://localhost:8080/api/ruangan/');

        if ($response->successful()){
            $ruangan = $response->json();
            return view('ruangan_dosen', compact('ruangan'));
        }else {
            return back()->with('error', 'Gagal mengambil data ruangan');
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

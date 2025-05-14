<?php

namespace App\Http\Controllers;

use App\Models\ruangan_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RuanganAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('ruangan_admin');
        $response = Http::get('http://localhost:8080/ruangan/');

        if ($response->successful()){ 
            $ruangan = $response->json();
            return view('ruangan_admin', compact('ruangan'));
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
    public function show(ruangan_admin $ruangan_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ruangan_admin $ruangan_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ruangan_admin $ruangan_admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ruangan_admin $ruangan_admin)
    {
        //
    }
}

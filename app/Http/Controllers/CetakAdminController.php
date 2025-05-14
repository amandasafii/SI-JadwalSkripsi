<?php

namespace App\Http\Controllers;

use App\Models\cetak_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CetakAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
    {
        $response = Http::get('http://localhost:8080/view_penjadwalan');

        if ($response->successful()){
            $view_penjadwalan = $response->json();
            return view('cetak_admin', compact('view_penjadwalan'));
        }else {
            return back()->with('error', 'Gagal mengambil data');
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
    public function show(cetak_admin $cetak_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cetak_admin $cetak_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cetak_admin $cetak_admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cetak_admin $cetak_admin)
    {
        //
    }
}

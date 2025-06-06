<?php

namespace App\Http\Controllers;

use App\Models\cetak_dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;



class CetakDosenController extends Controller
{
    public function exportPdf()
{
    $response = Http::get('http://localhost:8080/view_penjadwalan');

    if ($response->successful()) {
        $view_penjadwalan = $response->json();
        $pdf = Pdf::loadView('cetak_dosen_pdf', compact('view_penjadwalan'));
        return $pdf->download('jadwal_sidang_dosen.pdf');
    } else {
        return back()->with('error', 'Gagal mengambil data');
    }
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/view_penjadwalan');

        if ($response->successful()){
            $view_penjadwalan = $response->json();
            return view('cetak_dosen', compact('view_penjadwalan'));
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
    public function show(cetak_dosen $cetak_dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cetak_dosen $cetak_dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cetak_dosen $cetak_dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cetak_dosen $cetak_dosen)
    {
        //
    }
}

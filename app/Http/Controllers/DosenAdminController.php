<?php

namespace App\Http\Controllers;

use App\Models\dosen_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DosenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dosen_admin');
        $response = Http::get('http://localhost:8080/dosen');

        if ($response->successful()){
            $dosen = $response->json();
            return view('dosen_admin', compact('dosen'));
        }else {
            return back()->with('error', 'Gagal mengambil data dosen');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_dosen')

    }
    }

    /**
     * Store a newly created resource in storage.
      */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nidn' => 'required|unique:dosen,nidn',
                'nama_dosen' => 'required'
            ]);

            Http::post('http://localhost:8080/dosen', $validate);
 response()->json([
                'success' => true,
                'message' => 'Dosen berhasil ditambahkan!',
                'data' => $request
            ], 201);

            return redirect()->route('dosenadmin');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }


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
        $respon_dosen = Http::get("http://localhost:8080/dosen/{id}");
        $dosen = $respon_dosen->json();
        return view('editdosen',[
            'dosen' => $dosen
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dosen_admin $dosen_admin)
    {
        try {
            $validate = $request->validate([
                'nidn' => 'required',
                'nama_dosen' => 'required'
            ]);
            
            Http::put("http://localhost:8080/dosen/{id}", $validate);

            response()->json([
                'success' => true,
                'message' => 'Dosen berhasil diperbarui',
                'data' => $request
            ], 200);
return redirect()->route('dosenadmin');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dosen_admin $dosen_admin)
    {
        Http::delete("http://localhost:8080/dosen/12345678");
        return redirect()->route('dosenadmin');

    }
}

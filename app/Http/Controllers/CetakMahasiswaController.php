<?php

namespace App\Http\Controllers;

// use App\Models\cetak_admin;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakMahasiswaController extends Controller
{
//     public function cari(Request $request)
// {
//     $npm = $request->npm;

//     try {
//         $client = new \GuzzleHttp\Client();
//         $url = 'http://localhost:8080/mahasiswa/' . $npm;

//         $response = $client->request('GET', $url);
//         $mahasiswa = json_decode($response->getBody()->getContents(), true);

//         // Simpan ke session
//         return redirect()->route('cetak_mahasiswa.index')->with('mahasiswa', $mahasiswa['data']);
//     } catch (\Exception $e) {
//         return redirect()->route('cetak_mahasiswa.index')->with('error', 'Data mahasiswa tidak ditemukan.');
//     }
// }

// public function exportPdf($npm)
// {
//     $response = Http::get("http://localhost:8080/mahasiswa/{$npm}");

//     if ($response->successful()) {
//         $mahasiswa = $response->json()['data'];
//         $pdf = Pdf::loadView('pdf.cetak_mahasiswa_pdf', compact('mahasiswa'));
//         return $pdf->download("data_mahasiswa_{$npm}.pdf");
//     } else {
//         return back()->with('error', 'Gagal generate PDF');
//     }
// }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $client = new Client();
        $url = 'http://localhost:8080/view_penjadwalan';

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($data);
        $currentPageItems = $itemCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedData = new LengthAwarePaginator(
            $currentPageItems,
            count($itemCollection),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('cetak_mahasiswa', ['data' => $paginatedData]);
    }
}

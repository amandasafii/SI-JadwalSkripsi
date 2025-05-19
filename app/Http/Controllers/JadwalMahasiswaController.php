<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Pagination\LengthAwarePaginator;

class JadwalMahasiswaController extends Controller
{
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

        return view('jadwal_mahasiswa', ['data' => $paginatedData]);
    }
}

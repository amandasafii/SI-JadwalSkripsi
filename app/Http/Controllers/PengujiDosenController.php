<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PengujiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $url = 'http://localhost:8080/view_penguji';

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

        return view('penguji_dosen', ['data' => $paginatedData]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(penguji_dosen $penguji_dosen)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(penguji_dosen $penguji_dosen)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, penguji_dosen $penguji_dosen)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(penguji_dosen $penguji_dosen)
    // {
    //     //
    // }
}

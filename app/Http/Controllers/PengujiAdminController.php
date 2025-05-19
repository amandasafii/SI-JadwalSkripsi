<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PengujiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $url = 'http://localhost:8080/penguji';

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(strtolower($item['nidn']), $search) ||
                    str_contains(strtolower($item['peran']), $search);
            });
        }

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

        return view('penguji_admin', ['data' => $paginatedData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();

        $jadwalResponse = $client->request('GET', 'http://localhost:8080/jadwal');
        $dosenResponse = $client->request('GET', 'http://localhost:8080/dosen');

        $jadwalData = json_decode($jadwalResponse->getBody(), true)['data'];
        $dosenData = json_decode($dosenResponse->getBody(), true)['data'];

        $peran = [
            ['peran' => 'Penguji 1'],
            ['peran' => 'Penguji 2'],
        ];

        return view('tambah_pengujiadmin', [
            'jadwal' => $jadwalData,
            'dosen'   => $dosenData,
            'peran' => $peran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_jadwal = $request->id_jadwal;
        $nidn = $request->nidn;
        $peran = $request->peran;

        $parameters = [
            'id_jadwal' => $id_jadwal,
            'nidn'  => $nidn,
            'peran' => $peran,
        ];

        $client = new Client();
        $url = 'http://localhost:8080/penguji';

        try {
            $response = $client->request('POST', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('penguji_admin')->with('success', 'Data Penguji Sidang Berhasil Ditambahkan.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_penguji)
    {
        $client = new Client();

        try {
            $pengujiResponse = $client->request('GET', 'http://localhost:8080/penguji/' . $id_penguji);
            $pengujiData = json_decode($pengujiResponse->getBody()->getContents(), true);
            $data = $pengujiData['data'];

            $jadwalResponse = $client->request('GET', 'http://localhost:8080/jadwal');
            $jadwalData = json_decode($jadwalResponse->getBody()->getContents(), true);
            $jadwal = $jadwalData['data'];

            $dosenResponse = $client->request('GET', 'http://localhost:8080/dosen');
            $dosenData = json_decode($dosenResponse->getBody()->getContents(), true);
            $dosen = $dosenData['data'];

            $peran = [
                ['peran' => 'Penguji 1'],
                ['peran' => 'Penguji 2'],
            ];

            return view('edit_pengujiadmin', compact('data', 'jadwal', 'dosen', 'peran'));
            
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            $error = json_decode($response, true);

            $messages = $error['messages'] ?? ($error['message'] ?? ['Terjadi kesalahan saat mengambil data.']);
            return redirect()->to('edit_pengujiadmin')->withErrors($messages);
        } catch (\Exception $e) {
            return redirect()->to('edit_pengujiadmin')->withErrors(['Terjadi kesalahan tidak terduga.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_penguji)
    {
        $id_jadwal = $request->id_jadwal;
        $nidn = $request->nidn;
        $peran = $request->peran;;

        $parameters = [
            'id_jadwal' => $id_jadwal,
            'nidn'  => $nidn,
            'peran' => $peran,
        ];

        $client = new Client();
        $url = 'http://localhost:8080/penguji/' . $id_penguji;

        try {
            $response = $client->request('PUT', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('penguji_admin')->with('success', 'Data Penguji Sidang Berhasil Diubah.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_penguji)
    {
        $client = new Client();
        $url = 'http://localhost:8080/penguji/' . $id_penguji;

        try {
            $response = $client->request('DELETE', $url);
            return redirect('penguji_admin')->with('success', 'Data Penguji Sidang Berhasil Dihapus.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }
}

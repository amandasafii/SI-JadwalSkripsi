<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class RuanganAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $url = 'http://localhost:8080/ruangan';

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(strtolower($item['kode_ruangan']), $search) ||
                    str_contains(strtolower($item['nama_ruangan']), $search);
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

        return view('ruangan_admin', ['data' => $paginatedData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_ruanganadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_ruangan = $request->kode_ruangan;
        $nama_ruangan = $request->nama_ruangan;

        $parameters = [
            'kode_ruangan' => $kode_ruangan,
            'nama_ruangan' => $nama_ruangan,
        ];

        $client = new Client();
        $url = 'http://localhost:8080/ruangan';

        try {
            $response = $client->request('POST', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('ruangan_admin')->with('success', 'Data Ruangan Berhasil Ditambahkan.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_ruangan)
    {
        $client = new Client();
        $url = 'http://localhost:8080/ruangan/' . $kode_ruangan;

        try {
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            $data = $contentArray['data'];
            return view('edit_ruanganadmin', ['data' => $data]);
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            $error = json_decode($response, true);

            $messages = $error['messages']['message'] ?? ($error['message'] ?? ['Terjadi kesalahan saat mengambil data.']);
            return redirect()->to('edit_ruanganadmin')->withErrors($messages);
        } catch (\Exception $e) {
            return redirect()->to('edit_ruanganadmin')->withErrors(['Terjadi kesalahan tidak terduga.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_ruangan)
    {
        $kode_ruangan = $request->kode_ruangan;
        $nama_ruangan = $request->nama_ruangan;

        $parameters = [
            'kode_ruangan' => $kode_ruangan,
            'nama_ruangan' => $nama_ruangan,
        ];

        $client = new Client();
        $url = 'http://localhost:8080/ruangan/' . $kode_ruangan;

        try {
            $response = $client->request('PUT', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('ruangan_admin')->with('success', 'Data Ruangan Berhasil Diubah.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_ruangan)
    {
        $client = new Client();
        $url = 'http://localhost:8080/ruangan/' . $kode_ruangan;

        try {
            $response = $client->request('DELETE', $url);
            return redirect()->to('ruangan_admin')->with('success', 'Data Ruangan Berhasil Dihapus.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->to('ruangan_admin')->withErrors($validationErrors)->withInput();
        }
    }
}

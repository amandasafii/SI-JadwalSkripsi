<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class JadwalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $url = 'http://localhost:8080/jadwal';

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(strtolower($item['npm']), $search) ||
                    str_contains(strtolower($item['kode_ruangan']), $search) ||
                    str_contains(strtolower($item['waktu_sidang']), $search);
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

        return view('jadwal_admin', ['data' => $paginatedData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();

        $mahasiswaResponse = $client->request('GET', 'http://localhost:8080/mahasiswa');
        $ruanganResponse = $client->request('GET', 'http://localhost:8080/ruangan');

        $mahasiswaData = json_decode($mahasiswaResponse->getBody(), true)['data'];
        $ruanganData = json_decode($ruanganResponse->getBody(), true)['data'];

        return view('tambah_jadwaladmin', [
            'mahasiswa' => $mahasiswaData,
            'ruangan'   => $ruanganData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $npm = $request->npm;
        $kode_ruangan = $request->kode_ruangan;
        $waktu_sidang = $request->waktu_sidang;

        $parameters = [
            'npm'          => $npm,
            'kode_ruangan' => $kode_ruangan,
            'waktu_sidang' => $waktu_sidang
        ];

        $client = new Client();
        $url = 'http://localhost:8080/jadwal';

        try {
            $response = $client->request('POST', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('jadwal_admin')->with('success', 'Data Jadwal Sidang Berhasil Ditambahkan.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
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
    public function edit(string $id_jadwal)
    {
        $client = new Client();

        try {
            $jadwalResponse = $client->request('GET', 'http://localhost:8080/jadwal/' . $id_jadwal);
            $jadwalData = json_decode($jadwalResponse->getBody()->getContents(), true);
            $data = $jadwalData['data'];

            $mahasiswaResponse = $client->request('GET', 'http://localhost:8080/mahasiswa');
            $mahasiswaData = json_decode($mahasiswaResponse->getBody()->getContents(), true);
            $mahasiswa = $mahasiswaData['data'];

            $ruanganResponse = $client->request('GET', 'http://localhost:8080/ruangan');
            $ruanganData = json_decode($ruanganResponse->getBody()->getContents(), true);
            $ruangan = $ruanganData['data'];

            return view('edit_jadwaladmin', compact('data', 'mahasiswa', 'ruangan'));
            
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            $error = json_decode($response, true);

            $messages = $error['messages']['message'] ?? ($error['message'] ?? ['Terjadi kesalahan saat mengambil data.']);
            return redirect()->to('edit_jadwaladmin')->withErrors($messages);
        } catch (\Exception $e) {
            return redirect()->to('edit_jadwaladmin')->withErrors(['Terjadi kesalahan tidak terduga.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_jadwal)
    {
        $npm = $request->npm;
        $kode_ruangan = $request->kode_ruangan;
        $waktu_sidang = $request->waktu_sidang;

        $parameters = [
            'npm'          => $npm,
            'kode_ruangan' => $kode_ruangan,
            'waktu_sidang' => $waktu_sidang
        ];

        $client = new Client();
        $url = 'http://localhost:8080/jadwal/' . $id_jadwal;

        try {
            $response = $client->request('PUT', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('jadwal_admin')->with('success', 'Data Jadwal Sidang Berhasil Diubah.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jadwal)
    {
        $client = new Client();
        $url = 'http://localhost:8080/jadwal/' . $id_jadwal;

        try {
            $response = $client->request('DELETE', $url);
            return redirect('jadwal_admin')->with('success', 'Data Jadwal Sidang Berhasil Dihapus.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }
}

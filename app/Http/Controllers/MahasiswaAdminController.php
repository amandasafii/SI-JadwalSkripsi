<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class MahasiswaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $url = 'http://localhost:8080/mahasiswa';

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(strtolower($item['npm']), $search) ||
                    str_contains(strtolower($item['nama_mahasiswa']), $search) ||
                    str_contains(strtolower($item['program_studi']), $search);
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

        return view('mahasiswa_admin', ['data' => $paginatedData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $npm = $request->npm;
        $nama_mahasiswa = $request->nama_mahasiswa;
        $program_studi = $request->program_studi;
        $judul_skripsi = $request->judul_skripsi;
        $email = $request->email;

        $parameters = [
            'npm' => $npm,
            'nama_mahasiswa' => $nama_mahasiswa,
            'program_studi' => $program_studi,
            'judul_skripsi' => $judul_skripsi,
            'email' => $email
        ];

        $client = new Client();
        $url = 'http://localhost:8080/mahasiswa';

        try {
            $response = $client->request('POST', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('mahasiswa_admin')->with('success', 'Data Mahasiswa Berhasil Ditambahkan.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(mahasiswa_admin $mahasiwa_admin)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $npm)
    {
        $client = new Client();
        $url = 'http://localhost:8080/mahasiswa/' . $npm;

        try {
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            $data = $contentArray['data'];
            return view('edit_mhsadmin', ['data' => $data]);
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            $error = json_decode($response, true);

            $messages = $error['messages']['message'] ?? ($error['message'] ?? ['Terjadi kesalahan saat mengambil data.']);
            return redirect()->to('edit_mhsadmin')->withErrors($messages);
        } catch (\Exception $e) {
            return redirect()->to('edit_mhsadmin')->withErrors(['Terjadi kesalahan tidak terduga.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $npm)
    {
        $nama_mahasiswa = $request->nama_mahasiswa;
        $program_studi = $request->program_studi;
        $judul_skripsi = $request->judul_skripsi;
        $email = $request->email;

        $parameters = [
            'nama_mahasiswa' => $nama_mahasiswa,
            'program_studi' => $program_studi,
            'judul_skripsi' => $judul_skripsi,
            'email' => $email
        ];

        $client = new Client();
        $url = 'http://localhost:8080/mahasiswa/' . $npm;

        try {
            $response = $client->request('PUT', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('mahasiswa_admin')->with('success', 'Data Mahasiswa Berhasil Diubah.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $npm)
    {
        $client = new Client();
        $url = 'http://localhost:8080/mahasiswa/' . $npm;

        try {
            $response = $client->request('DELETE', $url);
            return redirect()->to('mahasiswa_admin')->with('success', 'Data Mahasiswa Berhasil Dihapus.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->to('mahasiswa_admin')->withErrors($validationErrors)->withInput();
        }
    }
}

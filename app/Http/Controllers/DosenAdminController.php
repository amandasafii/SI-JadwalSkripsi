<?php

namespace App\Http\Controllers;

use App\Models\dosen_admin;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class DosenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $url = 'http://localhost:8080/dosen';

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(strtolower($item['nidn']), $search) ||
                    str_contains(strtolower($item['nama_dosen']), $search) ||
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

        return view('dosen_admin', ['data' => $paginatedData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_dosenadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nidn = $request->nidn;
        $nama_dosen = $request->nama_dosen;
        $program_studi = $request->program_studi;
        $email = $request->email;

        $parameters = [
            'nidn' => $nidn,
            'nama_dosen' => $nama_dosen,
            'program_studi' => $program_studi,
            'email' => $email
        ];

        $client = new Client();
        $url = 'http://localhost:8080/dosen';

        try {
            $response = $client->request('POST', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('dosen_admin')->with('success', 'Data berhasil ditambahkan.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
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
    public function edit(string $nidn)
    {
        $client = new Client();
        $url = 'http://localhost:8080/dosen/' . $nidn;

        try {
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            $data = $contentArray['data'];
            return view('edit_dosenadmin', ['data' => $data]);
        } catch (ClientException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            $error = json_decode($response, true);

            $messages = $error['messages']['message'] ?? ($error['message'] ?? ['Terjadi kesalahan saat mengambil data.']);
            return redirect()->to('edit_dosenadmin')->withErrors($messages);
        } catch (\Exception $e) {
            return redirect()->to('edit_dosenadmin')->withErrors(['Terjadi kesalahan tidak terduga.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nidn)
    {
        $nama_dosen = $request->nama_dosen;
        $program_studi = $request->program_studi;
        $email = $request->email;

        $parameters = [
            'nama_dosen' => $nama_dosen,
            'program_studi' => $program_studi,
            'email' => $email
        ];

        $client = new Client();
        $url = 'http://localhost:8080/dosen/' . $nidn;

        try {
            $response = $client->request('PUT', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameters)
            ]);

            return redirect('dosen_admin')->with('success', 'Data Jadwal sidang Berhasil Diubah.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $nidn)
    {
        $client = new Client();
        $url = 'http://localhost:8080/dosen/' . $nidn;

        try {
            $response = $client->request('DELETE', $url);
            return redirect()->to('dosen_admin')->with('success', 'Data berhasil dihapus.');
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            $validationErrors = $error['messages']['message'] ?? ['Terjadi kesalahan'];
            return redirect()->to('dosen_admin')->withErrors($validationErrors)->withInput();
        }
    }
}

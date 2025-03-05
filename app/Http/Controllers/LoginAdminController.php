<?php

namespace App\Http\Controllers;

use App\Models\login_admin;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('login_admin');
    }

    public function cek_login()
    {
        return redirect('dashboard_admin');
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
    public function show(login_admin $login_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login_admin $login_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login_admin $login_admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login_admin $login_admin)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\logout;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logout');
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
    public function show(logout $logout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(logout $logout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, logout $logout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logout $logout)
    {
        //
    }
}
?>

<?php

namespace App\Http\Controllers;

use App\Models\edit_cetakadmin;
use Illuminate\Http\Request;

class EditCetakadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('edit_cetakadmin');
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
    public function show(edit_cetakadmin $edit_cetakadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(edit_cetakadmin $edit_cetakadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, edit_cetakadmin $edit_cetakadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(edit_cetakadmin $edit_cetakadmin)
    {
        //
    }
}

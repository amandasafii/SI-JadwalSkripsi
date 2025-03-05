<?php

namespace App\Http\Controllers;

use App\Models\edit_dashadmin;
use Illuminate\Http\Request;

class EditDashadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('edit_dashadmin');
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
    public function show(edit_dashadmin $edit_dashadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(edit_dashadmin $edit_dashadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, edit_dashadmin $edit_dashadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(edit_dashadmin $edit_dashadmin)
    {
        //
    }
}

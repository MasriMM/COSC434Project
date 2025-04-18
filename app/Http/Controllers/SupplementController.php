<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplement'); // Only returns the view
    }

    /**
     * Fetch supplements via AJAX.
     */
    public function getSupplements(Request $request)
    {
        $query = Supplement::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        return response()->json($query->get());
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  
    }
}

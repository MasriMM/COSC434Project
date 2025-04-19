<?php

namespace App\Http\Controllers;

use App\Models\Supplement; // Import the Supplement model
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
        try {
            $query = Supplement::query();

            // Apply search filter if provided
            if ($request->has('search') && $request->search) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            // Apply category filter if provided
            if ($request->has('category') && $request->category) {
                $query->where('category_id', $request->category);
            }

            // Fetch the supplements based on the filters
            $supplements = $query->get();

            return response()->json($supplements);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error fetching supplements: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load supplements'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method is not used, you can leave it empty or handle it as needed.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // This method is not used, you can leave it empty or handle it as needed.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // This method is not used, you can leave it empty or handle it as needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // This method is not used, you can leave it empty or handle it as needed.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // This method is not used, you can leave it empty or handle it as needed.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // This method is not used, you can leave it empty or handle it as needed.
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Supplement;
use Illuminate\Http\Request;

class SupplementController extends Controller
{
    public function index()
    {
        return view('supplement');
    }

    public function getSupplements(Request $request)
    {
        try {
            $query = Supplement::with('category'); // Eager load category

            if ($request->has('search') && $request->search) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            if ($request->has('category') && $request->category) {
                $query->where('category_id', $request->category);
            }

            return response()->json($query->get());
        } catch (\Exception $e) {
            \Log::error('Error fetching supplements: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load supplements'], 500);
        }
    }
}

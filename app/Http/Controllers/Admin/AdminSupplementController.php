<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSupplementController extends Controller
{
    public function index(Request $request)
    {
        $query = Supplement::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting functionality
        if ($request->has('sort')) {
            $sort = $request->sort;
            switch ($sort) {
                case 'name_asc': $query->orderBy('name'); break;
                case 'name_desc': $query->orderByDesc('name'); break;
                case 'price_asc': $query->orderBy('price'); break;
                case 'price_desc': $query->orderByDesc('price'); break;
                case 'stock_asc': $query->orderBy('stock'); break;
                case 'stock_desc': $query->orderByDesc('stock'); break;
            }
        }

        $supplements = $query->paginate(100);

        if ($request->ajax()) {
            return view('admin.supplements.partials.table-body', compact('supplements'))->render();
        }

        return view('admin.supplements.index', compact('supplements'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming data
            $request->validate([
                'name'        => 'required|string|max:255',
                'price'       => 'required|numeric',
                'stock'       => 'required|integer',
                'description' => 'nullable|string', // Added description validation
                'category_id' => 'required|exists:categories,id',
                'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            \Log::info('Request data: ' . json_encode($request->all()));
        
            $data = $request->only(['name', 'price', 'category_id', 'stock', 'description']); // Include description in data

            // Check if image is uploaded
            if ($request->hasFile('image')) {
                // Store the image in the public disk (public/supplements)
                $imagePath = $request->file('image')->store('supplements', 'public');
                // Set the image path to be stored in the database
                $data['image'] = '/storage/' . $imagePath;  // Correct path to access the public storage
            } else {
                $data['image'] = '/imgs/EnergyCitrus.png';  // If no image is uploaded, use a default image
            }

            if ($request->input('id')) {
                // Update the existing supplement
                $supplement = Supplement::find($request->input('id'));
                if ($supplement) {
                    $supplement->update($data);
                } else {
                    return response()->json(['error' => 'Supplement not found'], 404);
                }
            } else {
                // Create a new supplement
                Supplement::create($data);
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Log::error('Error in store method: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name'        => 'required|string|max:255',
                'price'       => 'required|numeric',
                'stock'       => 'required|integer',
                'description' => 'nullable|string', // Description field added
                'category_id' => 'required|exists:categories,id',
                'image'       => 'nullable|image|max:2048',
            ]);

            $data = $request->only(['name', 'price', 'category_id', 'stock', 'description']); // Include description in data

            // Check if image is uploaded
            if ($request->hasFile('image')) {
                // Store the image in the public disk (public/supplements)
                $imagePath = $request->file('image')->store('supplements', 'public');
                // Set the image path to be stored in the database
                $data['image'] = '/storage/' . $imagePath;  // Correct path to access the public storage
            }

            $supplement = Supplement::findOrFail($id);
            $supplement->update($data);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error in update method: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    // Delete supplement
    public function destroy(Supplement $supplement)
    {
        if ($supplement->image) {
            Storage::disk('public')->delete($supplement->image);
        }

        $supplement->delete();

        return response()->json(['success' => true]);
    }
}

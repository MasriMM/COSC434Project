<?php

namespace App\Http\Controllers;

use App\Models\Supplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupplementController extends Controller
{
    public function index(Request $request)
    {
        $query = Supplement::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        if ($sort = $request->input('sort')) {
            $direction = $request->input('direction', 'asc');
            $query->orderBy($sort, $direction);
        } else {
            $query->latest();
        }

        $supplements = $query->paginate(10);

        return view('admin.supplements.index', compact('supplements'));
    }

    public function create()
    {
        return view('admin.supplements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('supplements', 'public');
        }

        Supplement::create($validated);

        return redirect()->route('supplements.index')->with('success', 'Supplement created successfully.');
    }

    public function show(Supplement $supplement)
    {
        return view('admin.supplements.show', compact('supplement'));
    }

    public function edit(Supplement $supplement)
    {
        return view('admin.supplements.edit', compact('supplement'));
    }

    public function update(Request $request, Supplement $supplement)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($supplement->image) {
                Storage::disk('public')->delete($supplement->image);
            }

            $validated['image'] = $request->file('image')->store('supplements', 'public');
        }

        $supplement->update($validated);

        return redirect()->route('supplements.index')->with('success', 'Supplement updated successfully.');
    }

    public function destroy(Supplement $supplement)
    {
        if ($supplement->image) {
            Storage::disk('public')->delete($supplement->image);
        }

        $supplement->delete();

        return redirect()->route('supplements.index')->with('success', 'Supplement deleted successfully.');
    }
}
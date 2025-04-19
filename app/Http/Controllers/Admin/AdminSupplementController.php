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

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

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

    $supplements = $query->paginate(10);

    if ($request->ajax()) {
        return view('admin.supplements.partials.table-body', compact('supplements'))->render();
    }

    return view('admin.supplements.index', compact('supplements'));
}

public function store(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'price'   => 'required|numeric',
        'stock'   => 'required|integer',
        'image'   => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['name', 'price', 'stock']);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('supplements', 'public');
    }

    Supplement::create($data);

    return response()->json(['success' => true]);
}

public function edit(Supplement $supplement)
{
    return response()->json($supplement);
}

public function update(Request $request, Supplement $supplement)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'price'   => 'required|numeric',
        'stock'   => 'required|integer',
    ]);

    $supplement->update($request->only(['name', 'price', 'stock']));

    return response()->json(['success' => true]);
}

public function destroy(Supplement $supplement)
{
    if ($supplement->image) {
        Storage::disk('public')->delete($supplement->image);
    }

    $supplement->delete();

    return response()->json(['success' => true]);
}

    
}

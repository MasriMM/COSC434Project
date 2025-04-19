<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\MuscleGroup;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.exercises.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $muscleGroups = MuscleGroup::all();
        return view('admin.exercises.create', compact('muscleGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'difficulty' => 'required|in:easy,intermediate,hard',
            'muscle_groups' => 'required|array',
            'muscle_groups.*' => 'exists:muscle_groups,id',
        ]);
    
        $imgPath = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imgs/exercises'), $fileName);
            $imgPath = 'imgs/exercises/' . $fileName;
        }
    
        $exercise = \App\Models\Exercise::create([
            'name' => $request->name,
            'img' => $imgPath,
            'description' => $request->description,
            'difficulty' => $request->difficulty,
        ]);
    
        $exercise->muscleGroups()->sync($request->muscle_groups);
    
        return redirect()->route('admin.exercises.index')->with('success', 'Exercise created successfully.');
    
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
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\MuscleGroup;
use App\Models\Exercise;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercises = Exercise::all();
        return view('admin.exercises.index', compact('exercises'));
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
        $exercise = Exercise::with('muscleGroups')->findOrFail($id);
        return view('admin.exercises.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $exercise = Exercise::with('muscleGroups')->findOrFail($id);
        $muscleGroups = MuscleGroup::all();
    
        return view('admin.exercises.edit', compact('exercise', 'muscleGroups'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'difficulty' => 'required|in:easy,intermediate,hard',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'muscle_groups' => 'nullable|array',
        ]);
    
        $exercise = Exercise::findOrFail($id);
    
        // Handle image upload if new image is provided
        if ($request->hasFile('img')) {
            $exercise->img = $request->file('img')->store('exercises', 'public');
        }
    
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->difficulty = $request->difficulty;
        $exercise->save();
    
        // Sync muscle groups
        $exercise->muscleGroups()->sync($request->input('muscle_groups', []));
    
        // Redirect back to exercises index
        return redirect()->route('admin.exercises.index')->with('success', 'Exercise updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return redirect()->route('admin.exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}
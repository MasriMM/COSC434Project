<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
Use App\Models\Program;
use \App\Models\MuscleGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exercises = Exercise::with('muscleGroups')->get(); 
        $muscleGroups = MuscleGroup::all();

        return view('admin.programs.create', compact('exercises', 'muscleGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'type' => 'required|in:lose_weight,build_muscle,improve_flexibility',
            'level' => 'required|in:easy,intermediate,hard',
            'duration' => 'required|numeric|min:0',
            'sets' => 'required|integer|min:1',
            'exercises' => 'nullable|array',
            'exercises.*.id' => 'exists:exercises,id',
            'exercises.*.reps' => 'required|string',
        ]);
    
        // Handle image upload
        $imgPath = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imgs/programs'), $fileName);
            $imgPath = 'imgs/programs/' . $fileName;
        }
    
        // Create the program
        $program = Program::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'img' => $imgPath,
            'description' => $request->description,
            'type' => $request->type,
            'level' => $request->level,
            'duration' => $request->duration,
            'is_public' => true, 
        ]);
    
        // Attach exercises with reps and sets
        if ($request->has('exercises')) {
            foreach ($request->exercises as $exerciseData) {
                $program->exercises()->attach($exerciseData['id'], [
                    'sets' => $request->sets,
                    'reps' => $exerciseData['reps'],
                ]);
            }
        }
    
        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::findOrFail($id);
        return view('admin.programs.show', compact('program'));
    }

    public function edit($id)
{
    $program = Program::with('exercises')->findOrFail($id);
    $exercises = Exercise::with('muscleGroups')->get();
    $muscleGroups = MuscleGroup::all();

    return view('admin.programs.edit', compact('program', 'exercises', 'muscleGroups'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'nullable|string',
        'type' => 'required|in:lose_weight,build_muscle,improve_flexibility',
        'level' => 'required|in:easy,intermediate,hard',
        'duration' => 'required|numeric|min:0',
        'sets' => 'required|integer|min:1',
        'exercises' => 'nullable|array',
    ]);

    $program = Program::findOrFail($id);

    // Handle image
    if ($request->hasFile('img')) {
        $program->img = $request->file('img')->store('programs', 'public');
    }

    $program->update($request->only(['name', 'description', 'type', 'level', 'duration', 'sets']));

    // Sync exercises with reps
    $exerciseData = [];
    if ($request->has('exercises')) {
        foreach ($request->exercises as $exId => $details) {
            $exerciseData[$exId] = ['reps' => $details['reps']];
        }
    }
    $program->exercises()->sync($exerciseData);

    return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);

        if ($program->img) {
            Storage::disk('public')->delete($program->img);
        }

        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program deleted.');
    }
}
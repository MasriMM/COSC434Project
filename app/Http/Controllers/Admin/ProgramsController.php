<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
Use App\Models\Program;
use \App\Models\MuscleGroup;
use Illuminate\Support\Facades\Auth;


class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.programs.index');
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
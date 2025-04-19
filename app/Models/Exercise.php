<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name', 
        'img', 
        'description', 
        'difficulty', 
    ];

    public function programs() {
        return $this->belongsToMany(Program::class, 'exercise_programs')
        ->withPivot('sets', 'reps')
        ->withTimestamps();
    }

    public function muscleGroups()
    {
        return $this->belongsToMany(MuscleGroup::class, 'exercise_muscle_groups');
    }
}
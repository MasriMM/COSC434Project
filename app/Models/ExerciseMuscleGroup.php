<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseMuscleGroup extends Model
{
    protected $table = 'exercise_muscle_groups';

    protected $fillable = [
        'exercise_id', 
        'muscle_group_id'
    ];

    public function exercises(){
        return $this->belongsTo(Exercise::class);
    }

    public function muscleGroups(){
        return $this->belongsTo(MuscleGroup::class);
    }
}

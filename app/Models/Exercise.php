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
        return $this->belongsToMany(Program::class)->withPivot('sets', 'reps');
    }

    public function muscleGroup() {
        return $this->belongsToMany(MuscleGroup::class);
    }
}

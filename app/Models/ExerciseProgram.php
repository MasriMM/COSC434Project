<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseProgram extends Model
{
    protected $table = 'exercise_programs';

    protected $fillable = [
        'exercise_id', 
        'program_id'
    ];

    public function exercises(){
        return $this->belongsTo(Exercise::class);
    }

    public function programs(){
        return $this->belongsTo(Program::class);
    }
}

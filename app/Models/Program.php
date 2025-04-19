<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'img',
        'description',
        'type',
        'level',
        'duration',
        'is_public',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function exercises() {
        return $this->belongsToMany(Exercise::class, 'exercise_programs')
                ->withPivot('sets', 'reps')
                ->withTimestamps();
    }

    public function likedByUsers() {
        return $this->belongsToMany(User::class, 'program_users')
                    ->using(ProgramUser::class);
    }
}

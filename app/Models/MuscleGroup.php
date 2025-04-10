<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function exercises(){
        return $this->belongsToMany(Exercise::class);
    }
}

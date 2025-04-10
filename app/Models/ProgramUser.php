<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramUser extends Model
{
    protected $table = 'program_users';

    protected $fillable = [
        'user_id', 
        'program_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }
}

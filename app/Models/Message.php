<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'subject',
        'content',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price', 
        'status', 
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function supplements() {
        return $this->belongsToMany(Supplement::class)->withPivot('quantity', 'subtotal');
    }
}

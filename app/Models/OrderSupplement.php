<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderSupplement extends Model
{
    protected $table = 'exercise_muscle_groups';

    protected $fillable = [
        'user_id',
        'order_id',
        'subtotal',
        'quantity'
    ];

    public function supplements(){
        return $this->belongsTo(Supplement::class);
    }

    public function orders(){
        return $this->belongsTo(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderSupplement extends Model
{
    protected $table = 'order_supplements'; // Explicitly specify table name

    protected $fillable = [
        'order_id',
        'supplement_id',
        'quantity',
        'subtotal'
    ];

    public function supplement()
    {
        return $this->belongsTo(Supplement::class, 'supplement_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{
    protected $fillable = [
        'name',
        'img',
        'description',
        'price', 
        'stock', 
        'category_id', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'subtotal');
    }
}

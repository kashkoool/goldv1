<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiamondDetail extends Model
{
    protected $fillable = [
        'product_id',
        'stones', // JSON array of stones
        'carat_price_syp',
        'carat_price_usd',
        'total_stone_price_syp',
        'total_stone_price_usd',
        'total_stone_weight',
    ];

    protected $casts = [
        'stones' => 'array', // Cast JSON to array
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

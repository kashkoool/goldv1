<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Product extends Model
{
    protected $fillable = [
        'store_id', 'name', 'material', 'karat', 'description', 'weight',
        'price_per_gram_syp', 'price_per_gram_usd', 'crafting_fee',
        'total_price_syp', 'total_price_usd', 'item_type', 'is_featured',
        'set_items', 'ring_size', 'stones', 'total_stone_weight' // Add these fields
    ];

    protected static function booted()
    {
        // Clear the cache when a product is saved or deleted
        static::saved(function ($product) {
            Cache::forget('dashboard_shared_view');
        });

        static::deleted(function ($product) {
            Cache::forget('dashboard_shared_view');
        });
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    // public function diamondDetail()
    // {
    //     return $this->hasOne(DiamondDetail::class);
    // }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function isLikedBy($user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}

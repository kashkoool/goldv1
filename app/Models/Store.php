<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Store extends Model
{
    protected $fillable = [
        'name',
         'location',
          'contact_pages',
          'latitude',
           'longitude',
            'subscription_end_date',
             'owner_id'
    ];

    protected static function booted()
    {
        // Clear the cache when a store is saved or deleted
        static::saved(function ($store) {
            Cache::forget('dashboard_shared_view');
        });

        static::deleted(function ($store) {
            Cache::forget('dashboard_shared_view');
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

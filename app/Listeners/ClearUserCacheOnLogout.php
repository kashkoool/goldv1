<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Cache;

class ClearUserCacheOnLogout
{
    public function handle(Logout $event)
    {
        // Define the cache key for the user
        $cacheKey = 'dashboard_shared_view_user_' . $event->user->id;

        // Clear the cache for the user
        Cache::forget($cacheKey);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class CacheCustomerResponse
{
    public function handle($request, Closure $next, $ttl = 300) // Default cache time: 5 minutes
    {
        // Generate a unique cache key for the request
        $cacheKey = 'customer_response_' . md5($request->fullUrl());

        // Check if the response is already cached
        if (Cache::has($cacheKey)) {
            return response(Cache::get($cacheKey));
        }

        // Get the response
        $response = $next($request);

        // Cache the response if it's not sensitive
        if (!$this->containsSensitiveData($response)) {
            Cache::put($cacheKey, $response->getContent(), $ttl);
        }

        return $response;
    }

    private function containsSensitiveData($response)
    {
        // Add logic to detect sensitive data in the response
        // For example, check for specific keywords or patterns
        return str_contains($response->getContent(), 'sensitive_keyword');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UniqueVisitor;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TrackUniqueVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        $cacheKey = 'visitor_' . md5($ip);

        if (!Cache::has($cacheKey)) {
            UniqueVisitor::firstOrCreate([
                'ip_address' => $ip
            ]);

            Cache::put($cacheKey, true, now()->addDay()->startOfDay());
        }

        return $next($request);
    }
}

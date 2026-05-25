<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaunchMode
{
    public function handle(Request $request, Closure $next): Response
    {
        if (SiteSetting::get('launch_mode') !== 'coming_soon') {
            return $next($request);
        }

        $path = $request->path();

        // Always allow: admin panel, launch routes, coming-soon page itself
        if (
            str_starts_with($path, 'admin') ||
            str_starts_with($path, 'launch') ||
            $path === 'coming-soon'
        ) {
            return $next($request);
        }

        return redirect('/coming-soon');
    }
}

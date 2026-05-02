<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CountVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('visitor_counted')) {
            $current = (int) SiteSetting::get('visitor_count', 2459);
            $newCount = $current + 1;

            DB::table('site_settings')->updateOrInsert(
                ['key' => 'visitor_count'],
                ['value' => $newCount, 'label' => 'Visitor Count', 'updated_at' => now(), 'created_at' => now()]
            );
            Cache::forget('setting_visitor_count');

            $request->session()->put('visitor_counted', true);
        }
        return $next($request);
    }
}

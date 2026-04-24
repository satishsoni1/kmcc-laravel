<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Make all site settings available in every view as $siteSettings
        View::composer('*', function ($view) {
            static $settings = null;
            if ($settings === null) {
                try {
                    $settings = \App\Models\SiteSetting::all()->keyBy('key');
                } catch (\Exception $e) {
                    $settings = collect();
                }
            }
            $view->with('siteSettings', $settings);
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'label', 'group'];

    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    public static function set(string $key, $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting_{$key}");
    }

    public static function clearPreviousPresses(): void
    {
        static::set('launch_member1_pressed_at', '');
        static::set('launch_member2_pressed_at', '');
        static::set('launch_member3_pressed_at', '');
        static::set('launch_member4_pressed_at', '');
        static::set('launch_completed_at', '');
    }
}

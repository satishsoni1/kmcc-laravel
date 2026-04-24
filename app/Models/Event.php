<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'event_date', 'event_time', 'venue', 'type', 'image_path', 'is_active',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'event_date' => 'date',
    ];

    public function scopeUpcoming($query)
    {
        return $query->where('is_active', true)->where('event_date', '>=', now());
    }
}

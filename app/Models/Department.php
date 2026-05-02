<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'slug', 'name', 'faculty_group', 'icon', 'color',
        'established_year', 'about', 'vision', 'mission', 'goals',
        'highlights', 'programmes_offered', 'facilities',
        'intake_ug', 'intake_pg', 'has_phd', 'hod_name', 'is_active', 'order',
    ];

    protected $casts = [
        'highlights'          => 'array',
        'programmes_offered'  => 'array',
        'facilities'          => 'array',
        'has_phd'             => 'boolean',
        'is_active'           => 'boolean',
    ];

    public function faculty()
    {
        return $this->hasMany(Faculty::class, 'department', 'slug')->where('is_active', true)->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getColorClassesAttribute(): array
    {
        return match ($this->color) {
            'blue'   => ['bg' => 'bg-blue-50',   'text' => 'text-blue-600',   'border' => 'border-blue-900',  'icon_bg' => 'bg-blue-100'],
            'green'  => ['bg' => 'bg-green-50',  'text' => 'text-green-600',  'border' => 'border-green-700', 'icon_bg' => 'bg-green-100'],
            'purple' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'border' => 'border-purple-700','icon_bg' => 'bg-purple-100'],
            'red'    => ['bg' => 'bg-red-50',    'text' => 'text-red-600',    'border' => 'border-red-700',   'icon_bg' => 'bg-red-100'],
            'orange' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-600', 'border' => 'border-orange-700','icon_bg' => 'bg-orange-100'],
            'teal'   => ['bg' => 'bg-teal-50',   'text' => 'text-teal-600',   'border' => 'border-teal-700',  'icon_bg' => 'bg-teal-100'],
            'indigo' => ['bg' => 'bg-indigo-50', 'text' => 'text-indigo-600', 'border' => 'border-indigo-700','icon_bg' => 'bg-indigo-100'],
            'sky'    => ['bg' => 'bg-sky-50',    'text' => 'text-sky-600',    'border' => 'border-sky-700',   'icon_bg' => 'bg-sky-100'],
            default  => ['bg' => 'bg-gray-50',   'text' => 'text-gray-600',   'border' => 'border-gray-700',  'icon_bg' => 'bg-gray-100'],
        };
    }
}

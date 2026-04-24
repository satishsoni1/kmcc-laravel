<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicDocument extends Model
{
    protected $fillable = [
        'type', 'title', 'academic_year', 'programme', 'department',
        'description', 'file_path', 'file_type', 'is_active', 'order',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeForYear($query, ?string $year)
    {
        return $year ? $query->where('academic_year', $year) : $query;
    }

    public static function typeLabel(string $type): string
    {
        return match ($type) {
            'academic_calendar' => 'Academic Calendar',
            'timetable'         => 'Timetable',
            'class_timetable'   => 'Class Timetable',
            'syllabus'          => 'Syllabus',
            default             => ucfirst($type),
        };
    }
}

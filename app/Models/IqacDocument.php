<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IqacDocument extends Model
{
    protected $fillable = [
        'type', 'title', 'academic_year', 'description', 'file_path', 'file_type', 'is_active', 'order',
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
            'sss_report'        => 'Student Satisfaction Survey Report',
            'aqar'              => 'AQAR Report',
            'activity_calendar' => 'IQAC Activity Calendar',
            'policy'            => 'Procedures & Policies',
            'meeting_minutes'   => 'Meeting Minutes',
            default             => ucfirst($type),
        };
    }
}

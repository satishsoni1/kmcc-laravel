<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamDocument extends Model
{
    protected $fillable = [
        'type', 'title', 'academic_year', 'semester', 'programme',
        'description', 'file_path', 'file_type', 'external_link', 'is_active', 'order',
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
            'calendar'   => 'Examination Calendar',
            'exam_form'  => 'Exam Form',
            'hall_ticket'=> 'Hall Ticket',
            'result'     => 'Result',
            default      => ucfirst($type),
        };
    }
}

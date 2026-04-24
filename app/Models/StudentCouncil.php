<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCouncil extends Model
{
    protected $fillable = ['name', 'position', 'programme', 'academic_year', 'photo_path', 'bio', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForYear($query, ?string $year)
    {
        return $year ? $query->where('academic_year', $year) : $query;
    }
}

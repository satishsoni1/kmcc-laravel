<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionsProspectus extends Model
{
    protected $table = 'admissions_prospectus';

    protected $fillable = [
        'title', 'academic_year', 'description', 'file_path', 'file_type', 'external_link', 'is_active', 'order',
    ];

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

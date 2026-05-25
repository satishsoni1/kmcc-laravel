<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JuniorCollegeStaff extends Model
{
    protected $table = 'junior_college_staff';

    protected $fillable = ['name', 'designation', 'qualification', 'subjects', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

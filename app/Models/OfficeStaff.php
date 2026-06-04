<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeStaff extends Model
{
    protected $table = 'office_staff';

    protected $fillable = [
        'name', 'designation', 'department', 'qualification',
        'email', 'phone', 'photo', 'is_active', 'order',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

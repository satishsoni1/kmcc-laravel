<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentGallery extends Model
{
    protected $table = 'department_gallery';

    protected $fillable = [
        'department_slug', 'image_path', 'caption', 'order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_slug', 'slug');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

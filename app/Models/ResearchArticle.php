<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchArticle extends Model
{
    protected $fillable = [
        'title', 'authors', 'journal_name', 'year',
        'volume', 'issue', 'page_no', 'doi',
        'department_slug', 'is_active',
    ];

    protected $casts = [
        'year'      => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_slug', 'slug');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CollegeCommittee extends Model
{
    protected $fillable = ['name', 'category', 'academic_year', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public static array $categories = [
        'naac_criteria' => 'NAAC Criteria Committees',
        'other'         => 'Other Committees',
    ];

    public function members(): HasMany
    {
        return $this->hasMany(CollegeCommitteeMember::class);
    }

    public function activeMembers(): HasMany
    {
        return $this->hasMany(CollegeCommitteeMember::class)
            ->where('is_active', true)
            ->orderBy('sort_order');
    }

    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeForCategory($q, string $cat) { return $q->where('category', $cat); }
}

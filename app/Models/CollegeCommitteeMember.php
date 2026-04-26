<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollegeCommitteeMember extends Model
{
    protected $fillable = [
        'college_committee_id', 'name', 'role', 'serial_number', 'sort_order', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public static array $roles = ['Chairman', 'Secretary', 'Member'];

    public function committee(): BelongsTo
    {
        return $this->belongsTo(CollegeCommittee::class, 'college_committee_id');
    }

    public function scopeActive($q) { return $q->where('is_active', true); }
}

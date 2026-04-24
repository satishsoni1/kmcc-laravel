<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    protected $fillable = [
        'name', 'designation', 'organization', 'committee_type',
        'role', 'serial_number', 'sort_order', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public static array $types = [
        'governing_body'    => 'Governing Body',
        'cdc'               => 'College Development Committee',
        'academic_council'  => 'Academic Council',
        'finance_committee' => 'Finance Committee',
        'board_of_studies'  => 'Board of Studies',
        'iqac'              => 'IQAC',
        'autonomy'          => 'Autonomy Committee',
    ];

    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeForType($q, string $type) { return $q->where('committee_type', $type); }

    public function getTypeLabelAttribute(): string
    {
        return self::$types[$this->committee_type] ?? $this->committee_type;
    }
}

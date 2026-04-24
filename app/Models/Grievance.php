<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'roll_number', 'programme', 'year_of_study',
        'grievance_type', 'subject', 'message', 'status', 'admin_remarks',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function statusBadgeClass(): string
    {
        return match ($this->status) {
            'pending'      => 'bg-yellow-100 text-yellow-800',
            'under_review' => 'bg-blue-100 text-blue-800',
            'resolved'     => 'bg-green-100 text-green-800',
            'closed'       => 'bg-gray-100 text-gray-600',
            default        => 'bg-gray-100 text-gray-600',
        };
    }
}

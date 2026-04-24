<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty_members';

    protected $fillable = [
        'name', 'designation', 'department', 'qualification', 'specialization',
        'email', 'phone', 'photo', 'bio', 'experience_years', 'is_active', 'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}

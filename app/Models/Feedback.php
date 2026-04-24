<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'name', 'email', 'programme', 'year_of_study', 'feedback_type', 'rating', 'message', 'is_read',
    ];

    protected $casts = ['is_read' => 'boolean'];
}

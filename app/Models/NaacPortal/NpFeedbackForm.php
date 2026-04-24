<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpFeedbackForm extends Model {
    protected $table = 'np_feedback_forms';
    protected $fillable = ['college_id','title','description','target_audience','is_active','is_anonymous','start_date','end_date','academic_year','created_by'];
    protected $casts = ['is_active' => 'boolean', 'is_anonymous' => 'boolean', 'start_date' => 'date', 'end_date' => 'date'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function questions() { return $this->hasMany(NpFeedbackQuestion::class, 'form_id')->orderBy('order'); }
    public function responses() { return $this->hasMany(NpFeedbackResponse::class, 'form_id'); }
    public function creator() { return $this->belongsTo(\App\Models\User::class, 'created_by'); }
}

<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpFeedbackQuestion extends Model {
    public $timestamps = false;
    protected $table = 'np_feedback_questions';
    protected $fillable = ['form_id','question','type','options','is_required','order'];
    protected $casts = ['options' => 'array', 'is_required' => 'boolean'];
    public function form() { return $this->belongsTo(NpFeedbackForm::class, 'form_id'); }
    public function answers() { return $this->hasMany(NpFeedbackAnswer::class, 'question_id'); }
}

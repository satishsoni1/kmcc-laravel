<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpFeedbackAnswer extends Model {
    public $timestamps = false;
    protected $table = 'np_feedback_answers';
    protected $fillable = ['response_id','question_id','answer','rating'];
    public function response() { return $this->belongsTo(NpFeedbackResponse::class, 'response_id'); }
    public function question() { return $this->belongsTo(NpFeedbackQuestion::class, 'question_id'); }
}

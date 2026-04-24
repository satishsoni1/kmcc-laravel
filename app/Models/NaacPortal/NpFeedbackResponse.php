<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpFeedbackResponse extends Model {
    protected $table = 'np_feedback_responses';
    protected $fillable = ['form_id','respondent_name','respondent_email','respondent_type','academic_year','programme','ip_address'];
    public function form() { return $this->belongsTo(NpFeedbackForm::class, 'form_id'); }
    public function answers() { return $this->hasMany(NpFeedbackAnswer::class, 'response_id'); }
}

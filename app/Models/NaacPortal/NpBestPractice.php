<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpBestPractice extends Model {
    protected $table = 'np_best_practices';
    protected $fillable = ['college_id','title','objective','context','practice_description','evidence_of_success','problems_encountered','academic_year','is_published'];
    protected $casts = ['is_published' => 'boolean'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
}

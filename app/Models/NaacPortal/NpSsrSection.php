<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpSsrSection extends Model {
    protected $table = 'np_ssr_sections';
    protected $fillable = ['college_id','criterion_id','academic_year','section_key','title','content','order','status','assigned_to'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function criterion() { return $this->belongsTo(NpCriterion::class, 'criterion_id'); }
    public function assignedUser() { return $this->belongsTo(\App\Models\User::class, 'assigned_to'); }
    public function statusBadge(): string {
        return match($this->status) {
            'draft'    => 'bg-yellow-100 text-yellow-700',
            'complete' => 'bg-green-100 text-green-700',
            'review'   => 'bg-blue-100 text-blue-700',
            'approved' => 'bg-purple-100 text-purple-700',
            default    => 'bg-gray-100 text-gray-600',
        };
    }
}

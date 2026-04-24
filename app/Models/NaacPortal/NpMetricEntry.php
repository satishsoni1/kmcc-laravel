<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpMetricEntry extends Model {
    protected $table = 'np_metric_entries';
    protected $fillable = ['college_id','metric_id','department_id','academic_year','data_value','description','score','status','assigned_to','reviewed_by','reviewer_remarks','deadline'];
    protected $casts = ['deadline' => 'date'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function metric() { return $this->belongsTo(NpMetric::class, 'metric_id'); }
    public function department() { return $this->belongsTo(NpDepartment::class, 'department_id'); }
    public function assignedUser() { return $this->belongsTo(\App\Models\User::class, 'assigned_to'); }
    public function reviewer() { return $this->belongsTo(\App\Models\User::class, 'reviewed_by'); }
    public function statusBadge(): string {
        return match($this->status) {
            'not_started' => 'bg-gray-100 text-gray-600',
            'draft'       => 'bg-yellow-100 text-yellow-700',
            'submitted'   => 'bg-blue-100 text-blue-700',
            'approved'    => 'bg-green-100 text-green-700',
            'returned'    => 'bg-red-100 text-red-700',
            default       => 'bg-gray-100 text-gray-600',
        };
    }
}

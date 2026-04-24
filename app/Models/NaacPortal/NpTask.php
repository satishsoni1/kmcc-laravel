<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpTask extends Model {
    protected $table = 'np_tasks';
    protected $fillable = ['college_id','created_by','criterion_id','metric_id','title','description','priority','status','due_date','academic_year'];
    protected $casts = ['due_date' => 'date'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function creator() { return $this->belongsTo(\App\Models\User::class, 'created_by'); }
    public function criterion() { return $this->belongsTo(NpCriterion::class, 'criterion_id'); }
    public function metric() { return $this->belongsTo(NpMetric::class, 'metric_id'); }
    public function assignees() { return $this->belongsToMany(\App\Models\User::class, 'np_task_user', 'task_id', 'user_id'); }
    public function comments() { return $this->hasMany(NpTaskComment::class, 'task_id')->orderBy('created_at'); }
    public function priorityBadge(): string {
        return match($this->priority) {
            'low'    => 'bg-gray-100 text-gray-600',
            'medium' => 'bg-blue-100 text-blue-700',
            'high'   => 'bg-orange-100 text-orange-700',
            'urgent' => 'bg-red-100 text-red-700',
            default  => 'bg-gray-100 text-gray-600',
        };
    }
    public function statusBadge(): string {
        return match($this->status) {
            'open'        => 'bg-yellow-100 text-yellow-700',
            'in_progress' => 'bg-blue-100 text-blue-700',
            'review'      => 'bg-purple-100 text-purple-700',
            'approved'    => 'bg-green-100 text-green-700',
            'closed'      => 'bg-gray-100 text-gray-600',
            default       => 'bg-gray-100 text-gray-600',
        };
    }
}

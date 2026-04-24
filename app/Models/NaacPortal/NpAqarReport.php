<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpAqarReport extends Model {
    protected $table = 'np_aqar_reports';
    protected $fillable = ['college_id','academic_year','title','status','created_by','approved_by','submission_date','approval_date','file_path','remarks'];
    protected $casts = ['submission_date' => 'date', 'approval_date' => 'date'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function creator() { return $this->belongsTo(\App\Models\User::class, 'created_by'); }
    public function approver() { return $this->belongsTo(\App\Models\User::class, 'approved_by'); }
    public function sections() { return $this->hasMany(NpAqarSection::class, 'aqar_id')->orderBy('order'); }
    public function completionPercent(): int {
        $total = $this->sections()->count();
        if (!$total) return 0;
        $done = $this->sections()->where('is_complete', true)->count();
        return (int) round(($done / $total) * 100);
    }
    public function statusBadge(): string {
        return match($this->status) {
            'draft'     => 'bg-yellow-100 text-yellow-700',
            'submitted' => 'bg-blue-100 text-blue-700',
            'approved'  => 'bg-green-100 text-green-700',
            'published' => 'bg-purple-100 text-purple-700',
            default     => 'bg-gray-100 text-gray-600',
        };
    }
}

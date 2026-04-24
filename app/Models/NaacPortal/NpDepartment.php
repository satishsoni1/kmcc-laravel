<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpDepartment extends Model {
    protected $table = 'np_departments';
    protected $fillable = ['college_id','name','code','hod_name','hod_email','faculty_count','student_count','is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function courses() { return $this->hasMany(NpCourse::class, 'department_id'); }
    public function metricEntries() { return $this->hasMany(NpMetricEntry::class, 'department_id'); }
}

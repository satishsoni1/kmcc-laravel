<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpCourse extends Model {
    protected $table = 'np_courses';
    protected $fillable = ['college_id','department_id','name','code','level','duration_years','intake_capacity','is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function department() { return $this->belongsTo(NpDepartment::class, 'department_id'); }
}

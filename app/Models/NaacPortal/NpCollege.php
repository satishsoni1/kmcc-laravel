<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class NpCollege extends Model {
    protected $table = 'np_colleges';
    protected $fillable = ['name','short_name','code','address','city','state','pin','phone','email','website','principal_name','iqac_coordinator_name','university_affiliation','ugc_recognition','aishe_code','established_year','type','logo_path','vision','mission','current_naac_grade','current_cgpa','last_accreditation_year','next_accreditation_year','is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function departments(): HasMany { return $this->hasMany(NpDepartment::class, 'college_id'); }
    public function courses(): HasMany { return $this->hasMany(NpCourse::class, 'college_id'); }
    public function documents(): HasMany { return $this->hasMany(NpDocument::class, 'college_id'); }
    public function tasks(): HasMany { return $this->hasMany(NpTask::class, 'college_id'); }
    public function aqarReports(): HasMany { return $this->hasMany(NpAqarReport::class, 'college_id'); }
    public function ssrSections(): HasMany { return $this->hasMany(NpSsrSection::class, 'college_id'); }
    public function metricEntries(): HasMany { return $this->hasMany(NpMetricEntry::class, 'college_id'); }
    public function feedbackForms(): HasMany { return $this->hasMany(NpFeedbackForm::class, 'college_id'); }
    public function accreditationCycles(): HasMany { return $this->hasMany(NpAccreditationCycle::class, 'college_id'); }
    public function bestPractices(): HasMany { return $this->hasMany(NpBestPractice::class, 'college_id'); }
    public function users() { return $this->belongsToMany(\App\Models\User::class, 'np_college_user', 'college_id', 'user_id')->withPivot('portal_role','department_id','is_active')->withTimestamps(); }
}

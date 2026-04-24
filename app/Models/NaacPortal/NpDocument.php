<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpDocument extends Model {
    protected $table = 'np_documents';
    protected $fillable = ['college_id','uploaded_by','metric_id','department_id','title','description','file_path','file_name','file_type','file_size','academic_year','tags','version','parent_id','file_hash','download_count','is_public'];
    protected $casts = ['tags' => 'array', 'is_public' => 'boolean'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function uploader() { return $this->belongsTo(\App\Models\User::class, 'uploaded_by'); }
    public function metric() { return $this->belongsTo(NpMetric::class, 'metric_id'); }
    public function department() { return $this->belongsTo(NpDepartment::class, 'department_id'); }
    public function criteria() { return $this->belongsToMany(NpCriterion::class, 'np_document_criterion', 'document_id', 'criterion_id'); }
    public function versions() { return $this->hasMany(NpDocument::class, 'parent_id'); }
    public function parent() { return $this->belongsTo(NpDocument::class, 'parent_id'); }
    public function fileSizeFormatted(): string {
        if (!$this->file_size) return '—';
        $units = ['B','KB','MB','GB'];
        $i = 0; $size = $this->file_size;
        while ($size >= 1024 && $i < 3) { $size /= 1024; $i++; }
        return round($size, 2) . ' ' . $units[$i];
    }
}

<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpCriterion extends Model {
    protected $table = 'np_criteria';
    protected $fillable = ['number','name','description','weightage','is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function metrics() { return $this->hasMany(NpMetric::class, 'criterion_id')->orderBy('order'); }
    public function tasks() { return $this->hasMany(NpTask::class, 'criterion_id'); }
    public function documents() { return $this->belongsToMany(NpDocument::class, 'np_document_criterion', 'criterion_id', 'document_id'); }
}

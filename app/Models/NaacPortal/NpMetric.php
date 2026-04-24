<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpMetric extends Model {
    protected $table = 'np_metrics';
    protected $fillable = ['criterion_id','code','name','description','max_score','requires_documents','is_active','order'];
    protected $casts = ['requires_documents' => 'boolean', 'is_active' => 'boolean'];
    public function criterion() { return $this->belongsTo(NpCriterion::class, 'criterion_id'); }
    public function entries() { return $this->hasMany(NpMetricEntry::class, 'metric_id'); }
    public function documents() { return $this->hasMany(NpDocument::class, 'metric_id'); }
}

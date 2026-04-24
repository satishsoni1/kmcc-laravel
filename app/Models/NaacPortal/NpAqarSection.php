<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpAqarSection extends Model {
    protected $table = 'np_aqar_sections';
    protected $fillable = ['aqar_id','criterion_id','section_key','title','content','order','is_complete'];
    protected $casts = ['is_complete' => 'boolean'];
    public function aqar() { return $this->belongsTo(NpAqarReport::class, 'aqar_id'); }
    public function criterion() { return $this->belongsTo(NpCriterion::class, 'criterion_id'); }
}

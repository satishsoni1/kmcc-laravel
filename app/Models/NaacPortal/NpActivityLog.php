<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpActivityLog extends Model {
    public $timestamps = false;
    protected $table = 'np_activity_logs';
    protected $fillable = ['college_id','user_id','action','model_type','model_id','description','old_values','new_values','ip_address','user_agent','created_at'];
    protected $casts = ['old_values' => 'array', 'new_values' => 'array', 'created_at' => 'datetime'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
    public function user() { return $this->belongsTo(\App\Models\User::class, 'user_id'); }
    public static function log(string $action, string $desc, $model = null, $oldVals = null, $newVals = null): void {
        $collegeId = session('np_college_id');
        static::create(['college_id' => $collegeId, 'user_id' => auth()->id(), 'action' => $action, 'model_type' => $model ? get_class($model) : null, 'model_id' => $model?->id, 'description' => $desc, 'old_values' => $oldVals, 'new_values' => $newVals, 'ip_address' => request()->ip(), 'user_agent' => request()->userAgent(), 'created_at' => now()]);
    }
}

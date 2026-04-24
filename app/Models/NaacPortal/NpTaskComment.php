<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpTaskComment extends Model {
    protected $table = 'np_task_comments';
    protected $fillable = ['task_id','user_id','comment','attachment_path'];
    public function task() { return $this->belongsTo(NpTask::class, 'task_id'); }
    public function user() { return $this->belongsTo(\App\Models\User::class, 'user_id'); }
}

<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpPortalNotification extends Model {
    protected $table = 'np_portal_notifications';
    protected $fillable = ['college_id','user_id','type','title','message','link','is_read','read_at'];
    protected $casts = ['is_read' => 'boolean', 'read_at' => 'datetime'];
    public function user() { return $this->belongsTo(\App\Models\User::class, 'user_id'); }
}

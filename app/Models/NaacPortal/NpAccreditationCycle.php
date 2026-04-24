<?php
namespace App\Models\NaacPortal;
use Illuminate\Database\Eloquent\Model;
class NpAccreditationCycle extends Model {
    protected $table = 'np_accreditation_cycles';
    protected $fillable = ['college_id','cycle','year_of_accreditation','grade','cgpa','valid_upto','peer_team_visit_date','highlights','certificate_path'];
    protected $casts = ['valid_upto' => 'date'];
    public function college() { return $this->belongsTo(NpCollege::class, 'college_id'); }
}

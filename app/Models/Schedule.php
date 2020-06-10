<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;
use App\User;

class Schedule extends Model
{
    protected $fillable = ['user_id','nameSchedule','lu1','lu2','lu3','lu4','lu5','lu6','ma1','ma2','ma3','ma4','ma5','ma6','mi1','mi2','mi3','mi4','mi5','mi6','ju1','ju2','ju3','ju4','ju5','ju6','vi1','vi2','vi3','vi4','vi5','vi6',];
    
    public function createBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

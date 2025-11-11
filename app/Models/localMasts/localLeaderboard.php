<?php

namespace App\Models\localMasts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localLeaderboard extends Model
{
    protected $connection = 'masts';
    protected $table = 'local_masts_leaderboard';
    protected $fillable = ['campus_id', 'event_id', 'gold'];

    public function localCampuses(){
        return $this->belongsTo(localCampuses::class, 'campus_id', 'id');
    }

    public function localEvent(){
        return $this->belongsTo(localEvent::class, 'event_id', 'id');
    }
}

<?php

namespace App\Models\intramurals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intraLeaderboard extends Model
{
    protected $connection = 'intra';
    protected $table = 'intra_leaderboard';
    protected $fillable = ['college_id', 'event_id', 'gold'];

    public function intraCollege(){
        return $this->belongsTo(intraColleges::class, 'college_id', 'id');
    }

    public function intraEvent(){
        return $this->belongsTo(intraEvent::class, 'event_id', 'id');
    }
}

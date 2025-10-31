<?php

namespace App\Models\intramurals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intra_Leaderboard extends Model
{
    protected $connection = 'intra';
    protected $table = 'intra_leaderboard';
    protected $fillable = ['college_id', 'event_id', 'gold'];

    public function intraCollege(){
        return $this->belongsTo(intraColleges::class);
    }

    public function intraEvent(){
        return $this->belongsTo(intraEvent::class);
    }
}

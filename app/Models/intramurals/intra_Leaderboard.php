<?php

namespace App\Models\intramurals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intra_Leaderboard extends Model
{
    protected $connection = 'intra';
    protected $table = 'intra_leaderboard';
    protected $fillable = ['college_id', 'event_id', 'gold'];

    public function intra_college(){
        return $this->belongsTo(intra_Colleges::class);
    }

    public function intra_event(){
        return $this->belongsTo(intra_Events::class);
    }
}

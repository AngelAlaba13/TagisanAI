<?php

namespace App\Models\intramurals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intraEvent extends Model
{
    protected $connection = 'intra';
    protected $table = 'intra_event';
    protected $fillable = ['event_name', 'category', 'description', 'icon'];

    public function leaderboard(){
        return $this->hasMany(Leaderboard::class);
    }
}

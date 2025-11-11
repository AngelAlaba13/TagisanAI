<?php

namespace App\Models\localMasts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localEvent extends Model
{
    protected $connection = 'masts';
    protected $table = 'local_masts_event';
    protected $fillable = ['event_name', 'category', 'description', 'icon'];

    public function localLeaderboard(){
        return $this->hasMany(LocalLeaderboard::class);
    }
}

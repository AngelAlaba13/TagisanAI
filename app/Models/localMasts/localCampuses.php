<?php

namespace App\Models\localMasts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localCampuses extends Model
{
    protected $connection = 'masts';
    protected $table = 'local_masts_campuses';
    protected $fillable = ['campus_name', 'campus_code', 'campus_logo', 'campus_description'];

    public function localLeaderboard(){
        return $this->hasMany(LocalLeaderboard::class);
    }
}

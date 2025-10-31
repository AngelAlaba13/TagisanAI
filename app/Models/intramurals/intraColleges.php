<?php

namespace App\Models\intramurals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intra_Colleges extends Model
{
    protected $connection = 'intra';
    protected $table = 'intra_colleges';
    protected $fillable = ['college_name', 'college_code', 'col_governor', 'college_logo', 'col_description'];

    public function leaderboard(){
        return $this->hasMany(Leaderboard::class);
    }
}

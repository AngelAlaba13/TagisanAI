<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tryouts extends Model
{
    protected $table = 'tryout_events';

    protected $fillable = [
        'image_path',
        'tryout_name',
        'tryout_description',
        'tryout_schedule',
        'coach_name',
        'tryout_requirements',
        'tryout_link',
    ];

    protected $casts = [
        'tryout_schedule' => 'datetime',
    ];
}

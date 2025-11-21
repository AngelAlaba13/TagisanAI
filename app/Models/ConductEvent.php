<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConductEvent extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'contact_number',
        'event_description',
        'event_purpose',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveEventSetting extends Model
{
    protected $fillable = ['active_event'];

    public static function getActiveEvent(): string
    {
        return cache()->remember('active_event', 60, function () {
            return self::first()?->active_event ?? 'intramurals';
        });
    }

    public static function setActiveEvent(string $event): void
    {
        self::updateOrCreate(['id' => 1], ['active_event' => $event]);
        cache()->forget('active_event');
    }
}

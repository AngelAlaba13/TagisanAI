<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DatabaseHelper
{
    /**
     * Switch the default database connection based on the active event.
     */
    public static function switchConnection(string $event): void
    {
        $map = [
            'intramurals' => 'intra',  // connection name defined in config/database.php
            'masts' => 'masts',
            'events' => 'events',
        ];

        $connection = $map[$event] ?? 'intra';

        DB::setDefaultConnection($connection);
    }
}

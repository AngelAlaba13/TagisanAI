<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('masts')->create('local_masts_leaderboard', function (Blueprint $table) {
            $table->id();

            // content of table
            $table->foreignId('campus_id')->constrained('local_masts_campuses')->onDelete('cascade');
            $table->foreignId('event_id')->constrained('local_masts_event')->onDelete('cascade');

            $table->integer('gold')->default(0);

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_masts_leaderboard');
    }
};

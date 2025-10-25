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
        Schema::connection('intra')->create('intra_leaderboard', function (Blueprint $table) {
            $table->id();

            // content of table
            $table->foreignId('college_id')->constrained('intra_colleges')->onDelete('cascade');
            $table->foreignId('event_id')->constrained('intra_event')->onDelete('cascade');

            $table->integer('gold')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intra_leaderboard');
    }
};

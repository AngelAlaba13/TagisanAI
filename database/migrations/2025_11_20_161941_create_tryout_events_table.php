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
        Schema::create('tryout_events', function (Blueprint $table) {
            $table->id();

            // Picture (store file path: storage/app/public/events/)
            $table->string('image_path')->nullable();
            $table->string('tryout_name');
            $table->text('tryout_description')->nullable();
            $table->dateTime('tryout_schedule')->nullable();
            $table->string('coach_name')->nullable();
            $table->text('tryout_requirements')->nullable();
            $table->string('tryout_link')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tryout_events');
    }
};

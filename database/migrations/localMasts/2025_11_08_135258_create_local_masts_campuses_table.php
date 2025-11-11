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
        Schema::connection('masts')->create('local_masts_campuses', function (Blueprint $table) {
            $table->id();
            $table->string('campus_name', 225);
            $table->string('campus_code', 20);
            $table->string('campus_logo')->nullable();
            $table->string('campus_description', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_masts_campuses');
    }
};

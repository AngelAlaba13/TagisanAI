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
        Schema::connection('intra')->create('intra_colleges', function (Blueprint $table) {
            $table->id();
            $table->string('college_name', 225);
            $table->string('college_code', 6);
            $table->string('col_governor', 100);
            $table->string('college_logo')->nullable();
            $table->string('col_description', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intra_colleges');
    }
};

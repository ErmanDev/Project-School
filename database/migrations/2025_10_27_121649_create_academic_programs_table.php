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
        Schema::create('academic_programs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Preschool, Elementary, etc.
            $table->string('slug')->unique();
            $table->text('overview')->nullable();
            $table->text('course_description')->nullable();
            $table->text('curriculum_outline')->nullable();
            $table->text('admission_requirements')->nullable();
            $table->text('graduation_requirements')->nullable();
            $table->string('duration')->nullable(); // e.g., "4 years"
            $table->string('level'); // Preschool, Elementary, Junior High, Senior High, College
            $table->integer('order')->default(0); // For sorting
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_programs');
    }
};

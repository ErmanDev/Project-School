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
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('file_path'); // Path to the uploaded file
            $table->string('file_name'); // Original file name
            $table->string('file_type'); // e.g., 'pdf', 'docx', 'xlsx'
            $table->integer('file_size'); // Size in bytes
            $table->string('category'); // Academic Calendar, Policies, School Forms
            $table->integer('download_count')->default(0);
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
        Schema::dropIfExists('downloads');
    }
};

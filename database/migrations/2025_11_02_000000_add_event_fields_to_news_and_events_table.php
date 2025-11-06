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
        Schema::table('news_and_events', function (Blueprint $table) {
            $table->time('start_time')->nullable()->after('event_date');
            $table->time('end_time')->nullable()->after('start_time');
            $table->string('location')->nullable()->after('end_time');
            $table->string('venue')->nullable()->after('location');
            $table->string('registration_url')->nullable()->after('venue');
            $table->boolean('requires_registration')->default(false)->after('registration_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_and_events', function (Blueprint $table) {
            $table->dropColumn([
                'start_time',
                'end_time',
                'location',
                'venue',
                'registration_url',
                'requires_registration'
            ]);
        });
    }
};


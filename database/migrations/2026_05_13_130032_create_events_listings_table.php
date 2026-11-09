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
        Schema::create('events_listings', function (Blueprint $table) {

            $table->id();

            $table->string('eventTitle');

            $table->longText('eventDescription');

            $table->date('date');

            $table->enum('event_status', ['active', 'archived'])
                ->default('active');

            $table->string('location');

            $table->string('image')->nullable();

            $table->string('pdf')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_listings');
    }
};

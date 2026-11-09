<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            // Profile
            $table->string('profile_picture')->nullable();

            // Name fields
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            // Account info
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');

            // Role
            $table->enum('role', ['Super Admin', 'Event Manager'])->default('Event Manager');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};

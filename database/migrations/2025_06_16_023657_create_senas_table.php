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
        Schema::create('senas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('schedule');
            $table->string('requesting_party');
            $table->string('responding_party');
            $table->foreignId('user_id')->constrained('users'); // officiating officer
            $table->enum('status', ['pending', 'ongoing', 'completed', 'cancelled'])->default('pending'); // pending, ongoing, completed, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senas');
    }
};

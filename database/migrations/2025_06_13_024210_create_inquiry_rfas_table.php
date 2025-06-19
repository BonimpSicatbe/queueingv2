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
        Schema::create('inquiry_rfas', function (Blueprint $table) {
            $table->id();
            $table->integer('default_queue_number')->default(4001);
            $table->integer('queue_number')->default(4001);
            $table->integer('total_received')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_rfas');
    }
};

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
        Schema::create('queues', function (Blueprint $table) {
            $table->id(); // queue_number
            $table->enum('queue_type', ['compliance', 'inquiry, rfa, or others', 'receiving', 'sena inquiry']);
            $table->enum('status', ['waiting', 'called', 'completed'])->default('waiting');
            $table->string('fullname');
            $table->string('company');
            $table->string('address');
            $table->string('contact_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};

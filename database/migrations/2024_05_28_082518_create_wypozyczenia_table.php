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
        Schema::create('wypozyczenia', function (Blueprint $table) {
            $table->id(); // Auto-incrementing UNSIGNED BIGINT
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('towar_id')->constrained('towar')->onDelete('cascade');
            $table->date('data_wypozyczenia');
            $table->date('data_zwrotu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wypozyczenia');
    }
};



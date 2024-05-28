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
            $table->unsignedBigInteger('user_id'); // UNSIGNED BIGINT to match 'id' in 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Add other columns as needed
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

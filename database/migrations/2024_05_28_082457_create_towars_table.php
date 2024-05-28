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
        Schema::create('towar', function (Blueprint $table) {
            $table->id(); // Auto-incrementing UNSIGNED BIGINT
            $table->foreignId('kategoria_id')->constrained('kategoria')->onDelete('cascade');
            $table->string('nazwa');
            $table->text('opis')->nullable();
            $table->decimal('cena', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('towar');
    }
};

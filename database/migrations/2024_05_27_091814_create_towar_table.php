<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('towar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategoria_id');
            $table->string('nazwa');
            $table->text('opis')->nullable();
            $table->decimal('cena', 8, 2);
            $table->timestamps();

            $table->foreign('kategoria_id')->references('id')->on('kategoria')->onDelete('cascade');
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

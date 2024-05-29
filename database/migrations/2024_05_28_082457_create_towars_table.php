<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class reateTowaryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('towary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategoria_id');
            $table->string('nazwa');
            $table->text('opis')->nullable();
            $table->decimal('cena', 8, 2);
            $table->boolean('dostepnosc')->default(true);
            $table->timestamps();

            $table->foreign('kategoria_id')->references('id')->on('kategoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('towary');
    }
}

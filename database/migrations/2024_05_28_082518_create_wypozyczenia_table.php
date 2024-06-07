<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWypozyczeniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wypozyczenia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // Dodaj pozostałe kolumny w tabeli wypozyczenia
            $table->timestamps();

            // Dodaj klucz obcy
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wypozyczenia');
    }
}

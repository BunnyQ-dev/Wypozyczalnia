<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTowarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategoria_id');
            $table->string('nazwa', 255); // Zmienione z int na string
            $table->decimal('cena', 10, 2);
            $table->string('obraz', 255);
            $table->text('opis');
            $table->timestamps();

            $table->foreign('kategoria_id')->references('id')->on('kategoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towar');
    }
}

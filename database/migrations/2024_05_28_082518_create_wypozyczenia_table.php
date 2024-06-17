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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('towar_id');
            $table->date('data_wypozyczenia');
            $table->date('data_zwrotu')->nullable();
            $table->decimal('cena_do_zaplaty', 8, 2)->nullable();
            $table->string('status')->default('zarezerwowane');
            $table->string('payment_status')->default('nie zaplacone');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('towar_id')->references('id')->on('towar')->onDelete('cascade');
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


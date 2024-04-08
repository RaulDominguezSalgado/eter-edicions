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
        Schema::create('translators_books', function (Blueprint $table) {
            $table->unsignedBigInteger('translator_id');
            $table->unsignedBigInteger('book_id');

            $table->foreign('translator_id')->references('id')->on('translators')->onDelete('cascade'); //no s'hauria de poder eliminar traductor amb llibres
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            $table->primary(['translator_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translators_books');
    }
};

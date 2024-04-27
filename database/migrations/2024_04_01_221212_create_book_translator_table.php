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
        Schema::create('book_translator', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('translator_id');

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('translator_id')->references('id')->on('translators')->onDelete('restrict')->onUpdate('cascade');

            $table->primary(['translator_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_translator');
    }
};

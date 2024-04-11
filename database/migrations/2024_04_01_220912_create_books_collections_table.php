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
        Schema::create('books_collections', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('collection_id');
            $table->timestamps();

            // $table->foreign('book_id')->references('id')->on('books')->name('books_collections_book_id_foreign');
            // $table->foreign('collection_id')->references('id')->on('collections')->name('books_collections_collection_id_foreign');

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('collection_id')->references('id')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_collections');
    }
};

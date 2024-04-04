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
        Schema::create('books_bookstores', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('bookstore_id');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->name('books_bookstores_book_id_foreign');
            $table->foreign('bookstore_id')->references('id')->on('bookstores')->name('books_bookstores_bookstore_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_bookstores');
    }
};

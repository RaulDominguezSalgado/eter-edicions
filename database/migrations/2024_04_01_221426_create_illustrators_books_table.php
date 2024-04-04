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
        Schema::create('illustrators_books', function (Blueprint $table) {
            $table->unsignedBigInteger('illustrator_id');
            $table->unsignedBigInteger('book_id');

            $table->foreign('illustrator_id')->references('id')->on('illustrators')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            $table->primary(['illustrator_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('illustrators_books');
    }
};

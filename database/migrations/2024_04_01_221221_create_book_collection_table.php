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
        Schema::create('book_collection', function (Blueprint $table) {
            // $table->id();

            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('collection_id');
            // $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('restrict')->onUpdate('cascade');

            $table->primary(['book_id', 'collection_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_collection');
    }
};

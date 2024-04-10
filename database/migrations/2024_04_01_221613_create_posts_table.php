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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('translator_id')->nullable();
            $table->text('description');
            $table->dateTime('date')->nullable();
            $table->string('location')->nullable();
            $table->string('image');
            $table->text('content');
            $table->unsignedBigInteger('published_by')->nullable();
            $table->dateTime('publication_date');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('translator_id')->references('id')->on('translators')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('published_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

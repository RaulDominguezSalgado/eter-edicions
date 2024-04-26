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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('title')->unique();
            $table->string('original_title')->nullable();
            $table->text('headline')->nullable();
            $table->longText('description');
            $table->string('publisher');
            $table->string('original_publisher')->nullable();
            $table->string('image');
            $table->integer('number_of_pages')->nullable();
            $table->string('size')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('original_publication_date')->nullable();
            $table->decimal('pvp', 8, 2);
            $table->integer('iva');
            $table->decimal('discounted_price', 8, 2)->nullable();
            $table->integer('stock');
            $table->string('legal_diposit')->nullable();
            $table->string('enviromental_footprint')->nullable();
            $table->string('slug');
            $table->string('sample');
            $table->boolean('visible')->default(true);
            $table->string('meta_title');
            $table->text('meta_description');
            $table->timestamps();


            // $table->foreign('lang')->references('iso')->on('languages')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
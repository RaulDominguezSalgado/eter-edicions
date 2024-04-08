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
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('lang');
            $table->string('isbn')->unique();
            $table->string('publisher');
            $table->string('image');
            $table->decimal('pvp', 8, 2);
            $table->integer('iva');
            $table->decimal('discounted_price', 8, 2);
            $table->integer('stock');
            $table->boolean('visible')->default(true);
            $table->string('authory');
            $table->string('translation');
            $table->string('ilustration');
            $table->string('sample_url');
            $table->string('page_num');
            $table->string('publication_date');
            $table->string('colections');
            $table->timestamps();
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

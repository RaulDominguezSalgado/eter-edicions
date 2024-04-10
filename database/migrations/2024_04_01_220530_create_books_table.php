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
            $table->text('headline');
            $table->longText('description');
            $table->string('publisher');
            $table->string('image');
            $table->decimal('pvp', 8, 2);
            $table->integer('iva');
            $table->decimal('discounted_price', 8, 2)->nullable();
            $table->integer('stock');
            $table->string('legal_diposit')->nullable();
            $table->boolean('visible')->default(true);
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

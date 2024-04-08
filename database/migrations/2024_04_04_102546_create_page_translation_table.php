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
        Schema::create('page_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('lang');
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_translation');
    }
};

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
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('lang');
            $table->string('slug');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('lang')->references('iso')->on('languages')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_translations');
    }
};

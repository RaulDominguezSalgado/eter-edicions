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
        Schema::create('language_translations', function (Blueprint $table) {
            $table->string('iso_language');
            $table->string('iso_translation');
            $table->string('translation');

            $table->timestamps();

            $table->foreign('iso_language')->references('iso')->on('languages');
            $table->foreign('iso_translation')->references('iso')->on('languages');

            $table->primary(['iso_language', 'iso_translation']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_translation');
    }
};

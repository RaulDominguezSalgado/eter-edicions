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
        Schema::create('collaborators_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collaborator_id');
            $table->string('lang');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('biography');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('collaborator_id')->references('id')->on('collaborators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborators_translations');
    }
};
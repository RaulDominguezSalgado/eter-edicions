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
        Schema::create('collaborator_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collaborator_id');
            $table->string('lang');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('biography')->nullable();
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->timestamps();

            $table->foreign('collaborator_id')->references('id')->on('collaborators')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lang')->references('iso')->on('languages')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborator_translations');
    }
};

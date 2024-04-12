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
        Schema::create('translators', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('collaborator_id')->unique();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('collaborators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translators');
    }
};

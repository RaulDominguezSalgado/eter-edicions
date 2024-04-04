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
        Schema::create('authors', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary(); 
            $table->boolean('represented_by_agency')->default(false); // Si el autor está representado por una agencia
            $table->timestamps();

            // Restricción de clave foránea
            $table->foreign('id')->references('id')->on('collaborators')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};

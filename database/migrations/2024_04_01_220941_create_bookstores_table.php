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
        Schema::create('bookstores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('zip-code');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('website');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookstores');
    }
};

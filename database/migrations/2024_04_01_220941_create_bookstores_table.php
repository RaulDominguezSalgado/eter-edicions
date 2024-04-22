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
<<<<<<< HEAD
            $table->string('website');
=======
            $table->string('zip_code')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('country')->nullable();
            $table->string('website');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

>>>>>>> origin/main
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

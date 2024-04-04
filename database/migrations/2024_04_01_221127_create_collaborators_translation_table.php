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
        Schema::create('collaborators_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collaborator_id');
            $table->string('lang');
            $table->string('name');
            $table->string('last_name');
            $table->text('biography');
            $table->timestamps();

            $table->foreign('collaborator_id')->references('id')->on('collaborators')->name('collab_trans_collab_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborators_translation');
    }
};

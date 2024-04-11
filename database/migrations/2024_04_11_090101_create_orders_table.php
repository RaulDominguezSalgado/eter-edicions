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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('reference')->unique();
            $table->date('date');
            $table->decimal('total', 8, 2);
            $table->string('payment_method');
            $table->unsignedBigInteger('status_id');
            $table->string('pdf')->unique();
            $table->string('tracking_id')->unique();

            $table->timestamps();


            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

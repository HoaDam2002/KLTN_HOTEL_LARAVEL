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
        Schema::create('invoice_detail_service', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_booking_realtime');
            $table->bigInteger('id_invoice_service');
            $table->bigInteger('id_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_detail_service');
    }
};

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
        Schema::create('booking_realtime', function (Blueprint $table) {
            $table->id();
            $table->integer('id_booking');
            $table->integer('id_room');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->double('price');
            $table->integer('id_user');
            $table->integer('id_tour');
            $table->string('identity_card');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_realtime');
    }
};

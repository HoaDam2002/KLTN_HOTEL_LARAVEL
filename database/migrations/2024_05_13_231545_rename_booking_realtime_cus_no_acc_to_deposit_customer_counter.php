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
        Schema::rename('booking_realtime_cus_no_acc', 'deposit_customer_counter');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};

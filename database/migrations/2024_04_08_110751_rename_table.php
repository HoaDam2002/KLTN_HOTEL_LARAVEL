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
        Schema::rename('type_room', 'room_detail');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

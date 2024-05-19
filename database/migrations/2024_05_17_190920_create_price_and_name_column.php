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
        Schema::table('invoice_detail_food', function (Blueprint $table) {
            $table->string('price')->after('quantity');
            $table->string('name_food')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_detail_food', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('name_food');
        });
    }
};

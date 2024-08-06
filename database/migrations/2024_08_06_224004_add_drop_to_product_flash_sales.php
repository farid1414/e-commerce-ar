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
        Schema::table('product_flash_sales', function (Blueprint $table) {
            $table->dropForeign(['product_varian_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_flash_sales', function (Blueprint $table) {
            $table->foreign('product_varian_id')->references('id')->on('product_varians')->onDelete('cascade');
        });
    }
};

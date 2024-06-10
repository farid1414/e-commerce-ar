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
        Schema::table('product_varians', function (Blueprint $table) {
            $table->string('warna')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('harga')->nullable();
            $table->string('diskon')->nullable();
            $table->integer('panjang')->nullable();
            $table->integer('lebar')->nullable();
            $table->integer('tinggi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_varians', function (Blueprint $table) {
            //
        });
    }
};

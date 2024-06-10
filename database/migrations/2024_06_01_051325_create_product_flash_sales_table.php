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
        Schema::create('product_flash_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->index()->references("id")->on("products")->cascadeOnDelete();
            $table->foreignId("flash_sale_id")->index()->references("id")->on("flash_sales")->cascadeOnDelete();
            $table->foreignId("product_varian_id")->index()->references("id")->on("product_varians")->cascadeOnDelete();
            $table->integer('custom_stock')->nullable();
            $table->integer('custom_harga')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_flash_sales');
    }
};

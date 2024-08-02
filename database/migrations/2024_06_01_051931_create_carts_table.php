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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->index()->references("id")->on("products")->cascadeOnDelete();
            $table->foreignId("product_varian_id")->nullable()->index()->references("id")->on("product_varians")->cascadeOnDelete();
            $table->foreignId("user_id")->index()->references("id")->on("users")->cascadeOnDelete();
            $table->integer('qty');
            $table->integer('diskon')->nullable();
            $table->integer('harga');
            $table->integer('sub_total');
            $table->foreignId("flash_sale_id")->index()->nullable()->references("id")->on("flash_sales")->cascadeOnDelete();
            $table->smallInteger('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

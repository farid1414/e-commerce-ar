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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("transaction_id")->index()->references("id")->on("transactions")->cascadeOnDelete();
            $table->foreignId("product_id")->index()->references("id")->on("products")->cascadeOnDelete();
            $table->foreignId("product_varian_id")->index()->references("id")->on("product_varians")->cascadeOnDelete();
            $table->foreignId("flash_sale_id")->index()->nullable()->references("id")->on("flash_sales")->cascadeOnDelete();
            $table->integer('quantity')->default(0);
            $table->bigInteger('harga')->unsigned()->default(0);
            $table->bigInteger('total')->unsigned()->default(0);
            $table->bigInteger('diskon')->unsigned()->nullable()->default(0);
            $table->bigInteger('ongkir')->unsigned()->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};

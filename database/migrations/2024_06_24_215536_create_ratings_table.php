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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("transaction_id")->index()->nullable()->references("id")->on("transaction_details")->cascadeOnDelete();
            $table->foreignId("user_id")->index()->nullable()->references("id")->on("users")->cascadeOnDelete();
            $table->foreignId("product_id")->index()->nullable()->references("id")->on("products")->cascadeOnDelete();
            $table->foreignId("varian_id")->index()->nullable()->references("id")->on("product_varians")->cascadeOnDelete();
            $table->string('rating_value');
            $table->text('text_value')->nullable();
            $table->boolean('is_samaran')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->nullable();
            $table->foreignId("user_id")->index()->references("id")->on("users")->cascadeOnDelete();
            $table->bigInteger('order_amount')->unsigned();
            $table->bigInteger('ongkir')->unsigned()->nullable();
            $table->bigInteger('diskon')->unsigned()->default(0)->nullable();
            $table->string('status')->nullable();
            $table->text('snap_token')->nullable();
            $table->dateTime('payment_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

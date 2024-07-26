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
        Schema::create('rating_balasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("rating_id")->index()->nullable()->references("id")->on("ratings")->cascadeOnDelete();
            $table->foreignId("user_id")->index()->nullable()->references("id")->on("users")->cascadeOnDelete();
            $table->text('balasan');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_balasans');
    }
};

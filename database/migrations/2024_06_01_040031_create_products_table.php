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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->foreignId("m_categories")->nullable()->comment("master category")->index()->references("id")->on("m_categories");
            $table->foreignId("categori_id")->comment("master category")->index()->references("id")->on("categories");
            $table->string('sub_name')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('harga')->default(0);
            $table->text('description')->nullable();
            $table->integer('harga_ongkir')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('thumbnail');
            $table->text('link_ar')->nullable();
            $table->text('link_ar_ios')->nullable();
            $table->text('link_skybox')->nullable();
            $table->boolean('status_varian')->default(false);
            $table->boolean('status_diskon')->default(false);
            $table->boolean('status_dimensi')->default(false);
            $table->integer('diskon')->nullable()->default(0);
            $table->integer('stok_sekarang')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

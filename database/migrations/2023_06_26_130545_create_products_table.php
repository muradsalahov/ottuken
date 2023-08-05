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
            $table->string("product_promo_code");
            $table->string("product_link_id");
            $table->string("product_name");
            $table->string("product_price");
            $table->float('product_price_number', 8, 2);
            $table->string("product_marketplace");
            $table->string("product_comments");
            $table->string("product_rating");
            $table->text("product_url");
            $table->string("product_main_photo");
            $table->string("product_instock");
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->smallInteger('product_show_main')->nullable();
            $table->text("description")->nullable();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
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

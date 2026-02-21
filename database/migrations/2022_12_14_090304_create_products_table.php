<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_fr');
            $table->string('product_slug_fr');
            $table->string('product_code');
            $table->integer('avis');
            $table->string('product_tags_fr');
            $table->string('video_link')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->text('short_descp_fr')->nullable();
            $table->longText('long_descp_fr')->nullable();
            $table->string('specification_fr')->nullable();
            $table->string('product_thambnail');
            $table->string('langue')->nullable();
            $table->integer('top_sales')->nullable();
            $table->integer('top_views')->nullable();
            $table->integer('type')->nullable();
            $table->integer('top_20')->nullable();
            $table->integer('special')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

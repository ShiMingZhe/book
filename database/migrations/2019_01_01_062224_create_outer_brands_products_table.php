<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuterBrandsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outer_brands_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('brand_id')->comment('品牌Id');
            $table->string('name',100)->default('')->comment('产品名称');
            $table->string('price')->default('')->comment('产品价格');
            $table->string('spec')->comment('产品规格说明');
            $table->string('cover_url',150)->default('')->comment('产品封面');
            $table->text('detail')->comment('产品详情');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outer_brands_products');
    }
}

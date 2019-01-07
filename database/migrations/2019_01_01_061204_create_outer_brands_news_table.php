<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuterBrandsNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outer_brands_news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('brand_id')->comment('品牌Id');
            $table->string('cover_url',150)->default('')->comment('品牌动态封面');
            $table->string('short_introduce',150)->default('')->comment('一句话简介');
            $table->string('abstract')->default('')->comment('摘要');
            $table->text('detail')->comment('动态详情');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outer_brands_news');
    }
}

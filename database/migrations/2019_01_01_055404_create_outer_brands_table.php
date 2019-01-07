<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuterBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outer_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->comment('用户Id');
            $table->string('name',100)->default('')->comment('品牌名称');
            $table->string('address')->default('')->comment('品牌地址');
            $table->string('logo_url')->default('')->comment('品牌logo');
            $table->text('introduce')->comment('品牌介绍');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outer_brands');
    }
}

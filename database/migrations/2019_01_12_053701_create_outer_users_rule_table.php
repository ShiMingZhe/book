<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuterUsersRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outer_users_rule', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('brand_user_id')->comment("品牌用户Id");
            $table->string('brand_coordinator_id')->comment("品牌协管员");
            $table->string('brand_id')->comment('协管员所属的品牌');
            $table->string('rule')->comment("协管员权限");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outer_users_rule');
    }
}

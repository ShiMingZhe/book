<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOuterUsersRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outer_users_rule', function (Blueprint $table) {
            $table->integer('brand_user_id')->comment("品牌用户Id")->change();
            $table->integer('brand_coordinator_id')->comment("品牌协管员id")->change();
            $table->integer('brand_id')->comment('协管员所属的品牌id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

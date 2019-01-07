<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outer_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',45)->comment('用户名');
            $table->tinyInteger('sex')->comment('性别');
            $table->string('email', 45)->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->string('phone',45)->comment('手机号');
            $table->string('headimgurl',225)->default('')->comment('头像');
            $table->tinyInteger('role_id')
                ->comment('角色id,1超级管理员,2管理员,3普通管理员')->default(3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outer_users');
    }
}

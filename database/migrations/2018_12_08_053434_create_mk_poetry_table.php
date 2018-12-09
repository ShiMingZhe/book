<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkPoetryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mk_poetry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',30)->comment('诗的标题');
            $table->string('author',15)->default('')->comment('作者');
            $table->string('content')->comment('内容');
            $table->string('mp3_url',45)->comment('音频地址');
            $table->tinyInteger('is_available')->default(1)->comment('该条信息是否可用,1可用,0不可用');
            $table->string('uniq_code')->default('')->comment('唯一码');
            $table->string('short_introduce')->default('')->comment('短简介');
            $table->text('detail')->comment('详情页');
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
        Schema::dropIfExists('mk_poetry');
    }
}

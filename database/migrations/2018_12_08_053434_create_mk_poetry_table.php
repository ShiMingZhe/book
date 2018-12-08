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
            $table->string('title',30)
                ->nullable()->comment('诗的标题');
            $table->string('author',15)->comment('作者');
            $table->string('content')->comment('内容');
            $table->string('mp3_url',45)->comment('音频地址');
            $table->tinyInteger('is_available')->comment('该条信息是否可用');
            $table->string('uniq_code')->comment('唯一码');
            $table->string('short_introduce')->comment('短简介');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkKnowledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mk_knowledges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',100)->default('')->comment('知识名称');
            $table->string('category',30)->default('')->comment('类别');
            $table->string('price',30)->default('')->comment('价格');
            $table->text('content')->comment('内容');
            $table->string('origin',100)->default('')->comment('来源');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mk_knowledges');
    }
}

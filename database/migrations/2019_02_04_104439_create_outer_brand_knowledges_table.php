<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuterBrandKnowledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outer_brand_knowledges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('brand_id',30);
            $table->string('knowledge_id', 30);
            $table->string('status',5)->default('1')->comment('1 使用中 0废弃');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outer_brand_knowledges');
    }
}

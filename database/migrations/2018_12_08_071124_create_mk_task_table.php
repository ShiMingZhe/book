<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mk_task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45)->comment('任务名称');
            $table->tinyInteger('type')->comment('任务类型,1听一听');
            $table->tinyInteger('is_pass')->comment('是否通过,0不通过,1通过');
            $table->integer('operator_id')->comment('执行任务的id');
            $table->integer('task_id')->comment('相应表的id');
            $table->string('describe',45)->comment('描述');
            $table->string('reason')->comment('拒绝原因');
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
        Schema::dropIfExists('mk_task');
    }
}

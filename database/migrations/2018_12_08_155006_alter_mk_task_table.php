<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMkTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mk_task', function (Blueprint $table) {
            $table->string('name',45)->default('')->comment('任务名称')->change();
            $table->integer('operator_id')->nullable()->comment('执行任务的id')->change();
            $table->integer('task_id')->nullable()->comment('相应表的id')->change();
            $table->string('describe',45)->default('')->comment('描述')->change();
            $table->string('reason')->default('')->comment('拒绝原因')->change();
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

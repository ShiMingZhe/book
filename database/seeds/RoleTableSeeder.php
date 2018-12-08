<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mk_role')->insert([
            'name' => '超级管理员'
        ]);
        DB::table('mk_role')->insert([
            'name' => '管理员'
        ]);
        DB::table('mk_role')->insert([
            'name' => '普通管理员'
        ]);
    }
}

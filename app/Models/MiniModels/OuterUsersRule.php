<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2019/1/13
 * Time: 2:38 PM
 */

namespace App\Models\MiniModels;


class OuterUsersRule
{
    //指定表名
    protected $table = 'outer_users_rule';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['brand_user_id', 'brand_coordinator_id', 'brand_id', 'rule'];
}
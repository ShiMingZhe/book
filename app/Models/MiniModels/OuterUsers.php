<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 5:27 PM
 */

namespace App\Models\MiniModels;


use Illuminate\Database\Eloquent\Model;

class OuterUsers extends Model
{
    //指定表名
    protected $table = 'outer_users';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'sex', 'email', 'password', 'phone', 'headimgurl', 'role_id'];
}
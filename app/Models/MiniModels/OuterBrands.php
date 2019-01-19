<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2019/1/1
 * Time: 3:03 PM
 */

namespace App\Models\MiniModels;


use Illuminate\Database\Eloquent\Model;

class OuterBrands extends Model
{
    //指定表名
    protected $table = 'outer_brands';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'name', 'address', 'logo_url', 'introduce', 'default'];
}
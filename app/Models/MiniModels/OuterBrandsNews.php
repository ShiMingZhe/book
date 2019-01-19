<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2019/1/13
 * Time: 2:31 PM
 */

namespace App\Models\MiniModels;


class OuterBrandsNews
{
    //指定表名
    protected $table = 'outer_brands_news';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['brand_id', 'cover_url', 'short_introduce', 'abstract', 'detail'];
}
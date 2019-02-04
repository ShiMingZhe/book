<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2019/1/13
 * Time: 2:34 PM
 */

namespace App\Models\MiniModels;


use Illuminate\Database\Eloquent\Model;

class OuterBrandsProducts extends Model
{
    //指定表名
    protected $table = 'outer_brands_products';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['brand_id', 'bar_code', 'name', 'price', 'spec', 'detail'];
}
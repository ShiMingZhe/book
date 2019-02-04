<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 18-10-2
 * Time: 下午1:31
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Knowledges extends Model
{
    //指定表名
    protected $table = 'mk_knowledges';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'category', 'price', 'content', 'origin'];
}
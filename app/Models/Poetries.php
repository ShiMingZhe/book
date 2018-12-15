<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 18-9-22
 * Time: 下午2:57
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Poetries extends Model
{
    //指定表名
    protected $table = 'mk_poetry';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'author', 'content', 'mp3_url',
        'is_available', 'uniq_code', 'short_introduce', 'detail', 'sub_content'];

}
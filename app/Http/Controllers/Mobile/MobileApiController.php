<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/11/18
 * Time: 4:00 PM
 */

namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\Controller;
use App\Models\Poetries;

class MobileApiController extends Controller
{
    //获取诗词
    public function getPoetryContent($uniqId)
    {
        $poetry = Poetries::where('uniq_id', $uniqId)->first();

        return $poetry;
    }

    //看一看
    public function haveALook($offset)
    {
        $poetries = Poetries::where('is_available', 1)->offset($offset)->limit(10)->get();

        return $poetries;
    }
}
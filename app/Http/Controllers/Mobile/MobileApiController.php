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
    public function getPoetryContent($uniqId)
    {
        $poetry = Poetries::where('uniq_id', $uniqId)->first();/*'36b53bc405f81442ded755027b43c676'*/

        return $poetry;
    }
}
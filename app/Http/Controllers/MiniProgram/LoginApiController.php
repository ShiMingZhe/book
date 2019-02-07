<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2019/2/7
 * Time: 10:56 PM
 */

namespace App\Http\Controllers\MiniProgram;


use App\constants\WeixinAPI;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class LoginApiController extends Controller
{
    public function wxLogin()
    {
        $code = \Route::input('code');
        $appId = WeixinAPI::APP_ID;
        $appSecret = WeixinAPI::APP_SECRET;
        $client = new Client();
        $res = $client->request('get','https://api.weixin.qq.com/sns/jscode2session?appid='.$appId.'&secret='.$appSecret.'&js_code='.$code.'&grant_type=authorization_code');

        echo $res;
    }
}
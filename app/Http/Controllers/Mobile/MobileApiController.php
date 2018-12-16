<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/11/18
 * Time: 4:00 PM
 */

namespace App\Http\Controllers\Mobile;

use App\constants\WeixinAPI;
use App\Http\Controllers\Controller;
use App\Models\Poetries;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class MobileApiController extends Controller
{
    const WEIXIN_ACCESS_TOKEN = 'WeixinAccessToken';
    const WEIXIN_TICKET = 'WeixinTicket';

    //获取诗词
    public function getPoetryContent($uniqId)
    {
        $poetry = Poetries::where('uniq_code', $uniqId)->first();

        return $poetry;
    }

    //看一看
    public function haveALook($offset)
    {
        $poetries = Poetries::where('is_available', 1)->offset($offset)->limit(10)->get();

        return $poetries;
    }

    //创建HTTP客户端请求
    private function request($url, $postData, $method = 'post')
    {
        $client = new Client();
        if ($method == 'post') {
            return $client->request($method,$url, [
                'body' => $postData
            ])->getBody()->getContents();
        } else {
            return $client->request($method,$url, [
                'query' => $postData
            ])->getBody()->getContents();
        }
    }

    //微信获取access_token
    public function getAccessToken()
    {
        $postData = [
            'grant_type' => 'client_credential',
            'appid' => env('APPID'),
            'secret' => env('SECRET'),
        ];
        if (Redis::exists(self::WEIXIN_ACCESS_TOKEN)) {
            return Redis::get(self::WEIXIN_ACCESS_TOKEN);
        } else {
            $result = $this->request(WeixinAPI::WEIXIN_ACCESS_TOKEN, $postData, 'get');
            $result = json_decode($result,true);
            Redis::setex(self::WEIXIN_ACCESS_TOKEN,$result['expires_in']-60,$result['access_token']);

            return Redis::get(self::WEIXIN_ACCESS_TOKEN);
        }

    }

    //获取微信jsapi_ticket
    public function getJsApiTicket($accessToken)
    {
        $postData = [
            'access_token' => $accessToken,
            'type' => 'jsapi',
        ];

        $result =  $this->request(WeixinAPI::WEIXIN_JSAPI_TICKET, $postData, 'get');
        $result = json_decode($result, true);
        if (Redis::exists(self::WEIXIN_TICKET)) {
            return Redis::get(self::WEIXIN_TICKET);
        } else {
            Redis::setex(self::WEIXIN_TICKET, $result['expires_in']-60,$result['ticket']);

            return Redis::get(self::WEIXIN_TICKET);
        }

    }
}
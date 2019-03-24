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
use App\Models\MiniModels\OuterUsers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class LoginApiController extends Controller
{
    public function wxLogin()
    {
        $code = \Route::input('code');
        $appId = WeixinAPI::APP_ID;
        $appSecret = WeixinAPI::APP_SECRET;
        $client = new Client();
        $res = $client->request('GET','https://api.weixin.qq.com/sns/jscode2session?appid='.$appId.'&secret='.$appSecret.'&js_code='.$code.'&grant_type=authorization_code');

        return $res->getBody()->getContents();
    }

    /**
     * 后台管理员登录
     * @return false|string
     */
    public function login()
    {
        $input = Input::all();
        $user = OuterUsers::where('email', $input['name'])->get();
        if ($user->isEmpty()) {
            $user = OuterUsers::where('phone', $input['name'])->get();
        }
        if ($user->isNotEmpty()) {
            if ($input['password'] != decrypt($user->first()->password)) {
                return json_encode(['code' => '4', 'message' => '登录密码错误']);
            } elseif($input['code'] != Session::get('code')) {
                return json_encode(['code' => '4', 'message' => '登录验证码错误']);
            }
            Redis::set('outerUser:'.$input['name'],$user);

            return json_encode(['code' => '0', 'message' => '成功', 'data' => []]);
        } else {
            return json_encode(['code' => '4', 'message' => '失败', 'data' => []]);
        }
    }

    public function loginOut()
    {
        $input = Input::all();
        $result = Redis::del('outerUser:'.$input['userInfoId']);

        return $result;
    }
}
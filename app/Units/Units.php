<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 3:51 PM
 */

namespace App\Units;


use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Units
{
    /**
     * 验证码
     * @return string
     */
    public static function captchaCode()
    {
        $builder = new CaptchaBuilder();
        $code = $builder->build()->inline();
        Session::put('code',$builder->getPhrase());

        return $code;
    }

    /**
     * 上传图片
     */
    public static function uploadPic(Request $request)
    {

    }
}
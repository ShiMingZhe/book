<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 3:51 PM
 */

namespace App\Units;


use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
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
     * laravel 上传图片
     * @param Request $request
     * @param string $brandName
     * @return string
     */
    public static function uploadPic(Request $request, $brandName)
    {
        $fileCharater = $request->file('image_field');
        if ($fileCharater->isValid()) {
            $ext = $fileCharater->getClientOriginalExtension();
            $filename = date('Ymdhis').'.'.$ext;
            $fileCharater->move('/var/local/images/'.$brandName, $filename);

            return 'http://images.mukeen.com/'.$brandName.'/'.$filename;
        }
    }
}
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
    public static function uploadPic($data)
    {
        $handle = new \upload($data['image_field']);
        if ($handle->uploaded) {
            $handle->file_new_name_body = 'image_resized';
            $handle->image_resize = true;
            $handle->image_x = 100;
            $handle->image_ratio_y = true;
            $handle->process('../../public/');
            if ($handle->processed) {
                echo 'image resized';
                $handle->clean();
            } else {
                echo 'error:'.$handle->error;
            }
        }
    }
}
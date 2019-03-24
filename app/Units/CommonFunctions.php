<?php

namespace App\Units;


use App\Models\MiniModels\OuterBrands;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class CommonFunctions
{
    public static function getBrandUserId($id = '')
    {
        if (empty($id)) {
            $user = Session::get('outerUser');
            if ($user) {
                $userId = $user->all()[0]['id'];

                return $userId;
            } else {
                return false;
            }
        } else {//微信小程序专用
            $user = Redis::get('outerUser:'.$id);
            if ($user) {
                $user = json_decode($user, true);

                return $user[0]['id'];
            } else {
                return false;
            }
        }
    }

    public static function getBrandId($userId)
    {
        $brand = OuterBrands::where('user_id', $userId)->where('default', '1')->get();

        return $brandId = $brand[0]->id;
    }

    public static function getBrand($userId)
    {
        $brand = OuterBrands::where('user_id', $userId)->where('default', '1')->first();

        return $brand;
    }
}
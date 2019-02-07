<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2019/2/4
 * Time: 6:56 PM
 */

namespace App\Units;


use App\Models\MiniModels\OuterBrands;
use Illuminate\Support\Facades\Session;

class CommonFunctions
{
    public static function getBrandUserId()
    {
        $user = Session::get('outerUser');
        $userId = $user->all()[0]['id'];

        return $userId;
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
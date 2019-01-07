<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 10:37 PM
 */

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;
use App\Models\MiniModels\OuterBrands;
use Illuminate\Support\Facades\Session;

class OuterBrandController extends Controller
{
    /**
     * 查看品牌信息
     */
    public function index()
    {
        $user = Session::get('outerUser');
        $userId = $user->all()[0]['id'];
        $brandInfo = OuterBrands::where('user_id', $userId)->get();
        if ($brandInfo->isNotEmpty()) {
            return view('miniprogram.brand.index', ['brandInfo' => $brandInfo]);
        }

        return view('miniprogram.brand.index', ['brandInfo' => []]);
    }
}
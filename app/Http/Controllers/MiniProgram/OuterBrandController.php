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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class OuterBrandController extends Controller
{
    /**
     * 品牌介绍
     */
    public function index()
    {
        $userId = $this->getBrandUserId();
        $brandInfo = OuterBrands::where('user_id', $userId)->get();
        if ($brandInfo->isNotEmpty()) {
            return view('miniprogram.brand.index', ['brandInfo' => $brandInfo]);
        }

        return view('miniprogram.brand.index', ['brandInfo' => []]);
    }

    /**
     * 编辑品牌介绍
     */
    public function editorInfo()
    {
        return view('miniprogram.brand.brand_info_editor');
    }

    public function createInfo()
    {
        $input = Input::except("_token");
        var_dump($input);
    }

    /**
     * 品牌动态
     */
    public function news()
    {
        return view('miniprogram.brand.brand_news');
    }

    /**
     * 品牌动态编辑
     */
    public function newsEditor()
    {
        return view('miniprogram.brand.brand_news_editor');
    }

    /**
     * 产品列表
     */
    public function productions()
    {
        return view('miniprogram.brand.brand_productions');
    }

    /**
     * 编辑产品列表
     */
    public function editorProductions()
    {
        return view("miniprogram.brand.brand_productions_editor");
    }

    private function getBrandUserId()
    {
        $user = Session::get('outerUser');
        $userId = $user->all()[0]['id'];

        return $userId;
    }
}
<?php

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;
use App\Models\MiniModels\OuterBrands;
use App\Models\MiniModels\OuterBrandsNews;
use App\Models\MiniModels\OuterBrandsProducts;
use App\Units\CommonFunctions;
use Illuminate\Support\Facades\Input;

class BrandApiController extends Controller
{
    //扫码进入获取品牌介绍
    public function getBrandInfo()
    {
        $input = Input::all();
        $code = $input['code'];
        $brandInfo = OuterBrands::where('id', $code)->get();
        if ($brandInfo->isNotEmpty()) {
            return json_encode(['code' => '0', 'message' => '成功', 'data' => $brandInfo[0]]);
        } else {
            return json_encode(['code' => '4', 'message' => '失败', 'data' => []]);
        }
    }

    /**
     * 获取品牌动态
     * @return false|string
     */
    public function getBrandNews()
    {
        $input = Input::all();
        $code = $input['code'];
        $news = OuterBrandsNews::where('brand_id', $code)->get();
        if ($news->isNotEmpty()) {
            return json_encode(['code' => '0', 'message' => '成功', 'data' => $news]);
        } else {
            return json_encode(['code' => '4', 'message' => '失败', 'data' => []]);
        }
    }

    /**
     * 获取产品列表
     * @return false|string
     */
    public function getProductList()
    {
        $input = Input::all();
        $code = $input['code'];
        $products = OuterBrandsProducts::where('brand_id', $code)->get();
        if ($products->isNotEmpty()) {
            return json_encode(['code' => '0', 'message' => '成功', 'data' => $products]);
        } else {
            return json_encode(['code' => '4', 'message' => '失败', 'data' => []]);
        }
    }

    public function getAdminUserInfo()
    {
        $data = Input::all();
        $userId = CommonFunctions::getBrandUserId($data['id']);
        if ($userId) {
            return json_encode(['code' => '0', 'message' => '成功', 'data' => []]);
        } else {
            return json_encode(['code' => '4', 'message' => '失败', 'data' => []]);
        }
    }
}
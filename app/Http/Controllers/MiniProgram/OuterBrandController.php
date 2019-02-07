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
use App\Models\MiniModels\OuterBrandsNews;
use App\Models\MiniModels\OuterBrandsProducts;
use App\Units\CommonFunctions;
use App\Units\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $userId = $this->getBrandUserId();
        $brandInfo = OuterBrands::where('user_id', $userId)->get();
        if ($brandInfo->isNotEmpty()) {
            return view('miniprogram.brand.brand_info_editor', ['brandInfo' => $brandInfo]);
        } else {
            return view('miniprogram.brand.brand_info_editor', ['brandInfo' => []]);
        }


    }

    /**
     * 保存品牌介绍更改
     */
    public function editorSave(Request $request)
    {
        $userId = $this->getBrandUserId();
        $input = $request->except(['_token']);
        $data = [
            'name' => $input['brandName'],
            'address' => $input['brandAddress'],
            'introduce' => $input['brandIntroduce'],
        ];
        if (!empty($input['image_field'])) {
            $logoUrl = Units::uploadPic($request, $input['brandName']);
            $brand = OuterBrands::where('user_id', $userId)->where('default', '1')->first();
            if ($brand) {
                $url = $brand->logo_url;
                $arr = explode('/',$url);
                $file = end($arr);
                $brandName = prev($arr);
                Units::deletePic($brandName, $file);
            }
            $data['logo_url'] = $logoUrl;
        }
        $res = OuterBrands::where('user_id', $userId)->update($data);
        if ($res) {
            return redirect('/outer/brand/index');
        } else {
            return redirect('/outer/brand/editor');
        }
    }

    public function createInfo(Request $request)
    {
        $input = $request->except(['_token']);
        $message = [
            'brandName.required' => '品牌名不能为空'
        ];
        $validator = Validator::make($input, ['brandName'=> 'required'], $message);
        if (!$validator->fails()) {
            //$logoUrl = 'http://images.mukeen.com/muke/2019-01-29-02-30-52.png';
            $logoUrl = Units::uploadPic($request, $input['brandName']);
            $userId = $this->getBrandUserId();
            $data = [
                'user_id' => $userId,
                'name' => $input['brandName'],
                'address' => $input['brandAddress'],
                'introduce' => $input['brandIntroduce'],
                'logo_url' => $logoUrl,
            ];
            $result = OuterBrands::create($data);
            if ($result) {
                return redirect('/outer/brand/index');
            }
        } else {
            return redirect('/outer/brand/editor')->with(['errors' => $validator->errors()->all()]);
        }
    }

    /**
     * 品牌动态
     */
    public function news()
    {
        $userId = $this->getBrandUserId();
        $brandId = $this->getBrandId($userId);
        $news = OuterBrandsNews::where('brand_id', $brandId)->get();

        return view('miniprogram.brand.brand_news', ['news' => $news]);
    }

    /**
     * 新增品牌动态
     */
    public function createNews()
    {
        return view('miniprogram.brand.brand_news_editor');
    }

    /**
     * 保存品牌动态
     */
    public function storageNews(Request $request)
    {
        $input = $request->except(['_token']);
        $userId = $this->getBrandUserId();
        $brandId = $this->getBrandId($userId);
        $data = [
            'brand_id' => $brandId,
            'short_introduce' => $input['BrandShortIntroduce'],
            'abstract' => $input['BrandAbstract'],
            'detail' => $input['BrandDetail'],
        ];
        if (!empty($input['image_field'])) {
            $brand = CommonFunctions::getBrand($userId);
            $coverUrl = Units::uploadPic($request, $brand->name);
            $data['cover_url'] = $coverUrl;
        }
        $res = OuterBrandsNews::create($data);
        if ($res) {
            return redirect('/outer/brand/news');
        } else {
            return redirect('/outer/brand/news/create');
        }
    }

    /**
     * 品牌动态编辑
     */
    public function newsEditor($newId)
    {
        $new = OuterBrandsNews::find($newId);

        return view('miniprogram.brand.brand_news_editor', ['new' => $new]);
    }

    /**
     * 保存修改品牌动态
     */
    public function newsSave(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            'short_introduce' => $input['BrandShortIntroduce'],
            'abstract' => $input['BrandAbstract'],
            'detail' => $input['BrandDetail'],
        ];
        if (!empty($input['image_field'])) {
            $userId = CommonFunctions::getBrandUserId();
            $brand = CommonFunctions::getBrand($userId);
            $coverUrl = Units::uploadPic($request, $brand->name);
            $new = OuterBrandsNews::where('id', $input['newId'])->first();
            if ($brand) {
                $url = $new->cover_url;
                $arr = explode('/',$url);
                $file = end($arr);
                $brandName = prev($arr);
                Units::deletePic($brandName, $file);
            }
            $data['cover_url'] = $coverUrl;
        }
        $new = OuterBrandsNews::where('id', $input['newId'])->update($data);
        if ($new) {
            return redirect('/outer/brand/news');
        } else {
            return redirect('/outer/brand/news/editor/'.$input['newId']);
        }
    }

    /**
     * 产品列表
     */
    public function productions()
    {
        $products = OuterBrandsProducts::where('brand_id',$this->getBrandId($this->getBrandUserId()))->get();

        return view('miniprogram.brand.brand_productions', ['products' => $products]);
    }

    /**
     * 新增产品
     */
    public function createProductions()
    {
        $input = Input::except(['_token']);
        $brandId = $this->getBrandId($this->getBrandUserId());
        $data = [
            'brand_id' => $brandId,
            'bar_code' => $input['barCode'],
            'name' => $input['productName'],
            'price' => $input['price'],
            'spec' => $input['spec'],
            'detail' => $input['detail'],
        ];
        $product = OuterBrandsProducts::create($data);
        if ($product) {
            return redirect('/outer/brand/productions');
        } else {
            return redirect('/outer/brand/productions/create');
        }
    }

    /**
     * 编辑产品列表
     */
    public function editorProductions()
    {
        $productId = \Route::input('productId');
        $product = OuterBrandsProducts::where('id', $productId)->first();

        return view("miniprogram.brand.brand_productions_editor", ['product' => $product]);
    }

    /**
     * 保存编辑产品
     */
    public function saveProduct()
    {
        $input = Input::except(['_token']);
        $data = [
            'bar_code' => $input['barCode'],
            'name' => $input['productName'],
            'price' => $input['price'],
            'spec' => $input['spec'],
            'detail' => $input['detail'],
        ];
        $product = OuterBrandsProducts::where('id', $input['id'])->update($data);
        if ($product) {
            return redirect('/outer/brand/productions');
        } else {
            return redirect('/outer/brand/productions/editor/'.$input['id']);
        }
    }

    private function getBrandUserId()
    {
        $user = Session::get('outerUser');
        $userId = $user->all()[0]['id'];

        return $userId;
    }

    private function getBrandId($userId)
    {
        $brand = OuterBrands::where('user_id', $userId)->where('default', '1')->get();
        if ($brand->isNotEmpty()) {
            return $brandId = $brand[0]->id;
        } else {
            return redirect('/outer/brand/index');
        }
    }
}
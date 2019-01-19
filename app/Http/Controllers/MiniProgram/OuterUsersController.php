<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 10:38 PM
 */

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;
use App\Models\MiniModels\OuterBrands;
use App\Models\MiniModels\OuterUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OuterUsersController extends Controller
{
    /**
     * 人员管理首页
     */
    public function index()
    {
        return view('miniprogram.users.index');
    }

    /**
     * 设置协管员权限
     */
    public function settingRule()
    {
        return view('miniprogram.users.setting_rule');
    }

    /**
     * 新增协管员
     */
    public function createCooperator()
    {
        return view("miniprogram.users.user_cooperator_editor");
    }

    /**
     * 搜索用户
     */
    public function searchUser()
    {
        $id = Input::get("table_search");
        $user = OuterUsers::where(function ($query) use($id) {
            $query->where('email',$id)->orWhere('phone', $id);
        })->first();
        if ($user) {
            return $user;
        }

        return [];
    }

    /**
     * 绑定协管员
     */
    public function bindCooperator()
    {
        $cooperatorId = Input::get('id');
        $user = Session::get('outerUser');
        $userId = $user->all()[0]['id'];
        $brand = OuterBrands::where('user_id', '=', $userId)
            ->where('default','=', '1')->first();
        if ($brand) {

        }
        var_dump($brand);
    }
}
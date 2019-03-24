<?php

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;

class OuterAdminController extends Controller
{
    //小程序管理员登录界面
    public function index()
    {
        return view('miniprogram.admin.index');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 10:38 PM
 */

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;

class OuterUsersController extends Controller
{
    public function index()
    {
        return view('miniprogram.users.index');
    }
}
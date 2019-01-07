<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 10:39 PM
 */

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;

class OuterKnowledgeController extends Controller
{
    public function index()
    {
        return view('miniprogram.knowledge.index');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/9
 * Time: 8:11 AM
 */

namespace App\Http\Controllers;


class DatasController
{
    public function index() {
        return view('admin.data.datas');
    }
}
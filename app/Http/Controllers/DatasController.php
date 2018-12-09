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
    //音频列表
    public function list() {
        //$dir = $_SERVER['DOCUMENT_ROOT'].'/qrcode/';
        $dir = $_SERVER['DOCUMENT_ROOT'].'/../../../data';
        $data = scandir($dir);
        unset($data[0]);
        unset($data[1]);
        $data = array_values($data);

        return view('admin.data.music', ['data' => $data]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/9
 * Time: 8:11 AM
 */

namespace App\Http\Controllers;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
        //获取当前的分页数 初始是1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        //实例化collect方法
        $collection = new Collection($data);
        //定义每页显示多少数据
        $perPage = 10;
        //获取当前需要显示的数据列表
        $currentPageSearchResults = $collection->slice(($currentPage-1)*$perPage, $perPage)->all();
        //创建一个新的分页方法
        $paginateSearchResults_a = new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
        //存储路径防止下一页路径丢失
        $dataInfo = $paginateSearchResults_a->setPath('/music/list');

        return view('admin.data.music', [
            'data' => $data,
            'dataInfo' => $dataInfo,
        ]);
    }
}
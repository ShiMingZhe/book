<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/10/24
 * Time: 下午9:35
 */

namespace App\Http\Controllers;

class WebAppController extends Controller
{
    public function index($uniqId)
    {
        session(['uniq_id' => $uniqId]);

        return view('webapp/index', [
            'uniqId' => $uniqId,
        ]);
    }

    public function library()
    {
        return redirect('/qr/'.session('uniq_id'));
    }
}
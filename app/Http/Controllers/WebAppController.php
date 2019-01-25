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
        if (session('uniq_id') == 'poetry') {
            return redirect('/poetry/welcome');
        } else {
            return redirect('/qr/'.session('uniq_id'));
        }
    }

    public function poetryWelcome()
    {
        session(['uniq_id' => 'poetry']);

        return view('webapp/welcome_poetry');
    }
}
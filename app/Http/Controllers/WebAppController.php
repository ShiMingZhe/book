<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/10/24
 * Time: 下午9:35
 */

namespace App\Http\Controllers;


use App\Models\Poetries;

class WebAppController extends Controller
{
    public function index()
    {
        return view('webapp/index');
    }

    public function home()
    {
        $poetry = Poetries::where('uniq_id', '36b53bc405f81442ded755027b43c676')->first();

        return view('webapp/pages/main/home', [
            'poetry' => $poetry->content,
            'title' => $poetry->title,
            'author' => $poetry->author,
            'url' => $poetry->mp3_url,
        ]);
    }

    public function addressbook()
    {
        return view('webapp/pages/main/addressbook');
    }

    public function group()
    {
        return view('webapp/pages/main/group');
    }

    public function setting()
    {
        return view('webapp/pages/main/setting');
    }
}
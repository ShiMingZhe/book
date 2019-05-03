<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function article(){
        return view('index/article');
    }//
}

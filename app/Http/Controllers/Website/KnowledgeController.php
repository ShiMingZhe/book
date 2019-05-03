<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class KnowledgeController extends Controller
{
    public function knowledge()
    {
        return view('index/knowledge');
    }
}

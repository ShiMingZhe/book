<?php

namespace App\Http\Controllers;


use App\Models\Poetries;
use Illuminate\Support\Facades\DB;

class MobileController
{
    public function listenPoetry($uniq_id)
    {
        $poetry = Poetries::where('uniq_id', $uniq_id)->first();

        return view('mobile/index',
            [
                'poetry' => $poetry->content,
                'title' => $poetry->title,
                'author' => $poetry->author,
                'url' => $poetry->mp3_url,
            ]);
    }
}
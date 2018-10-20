<?php

namespace App\Http\Controllers;


use App\Models\Poetries;
use App\Models\Task;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //查看
    public function listen()
    {
        $poetries = Poetries::all();

        return view('admin/listen', ['poetries' => $poetries]);
    }

    //增加
    public function listenAdd()
    {
        $input = Input::except('_token');
        if (!empty($input)) {
            $res = Poetries::create($input);
            if ($res) {
                $task = Task::create([
                    'name' => $input['title'],
                    'type' => '1',
                    'is_pass' => '0',
                    'operator_id' => Session::get('user')->first()->id,
                    'task_id' => $res->id,
                    'describe' => '诗词管理',
                ]);
                if ($task) {
                    return redirect("/listen");
                }

                return view('admin/listenAdd');
            }
        }

        return view('admin/listenAdd');
    }

    //编辑
    public function editor($poetryId)
    {
        $data = Poetries::find($poetryId);

        return view('admin.listenEditor',['data' => $data]);
    }

    //更新
    public function update()
    {
        $input = Input::except('_token');
        if (!empty($input)) {
            $res = Poetries::where('id', $input['id'])->update($input);
            if ($res) {
                return redirect('/listen');
            }

            return view('admin.listenEditor',['data' => $input]);
        }
    }

    //生成唯一码
    public function createUniqId($id)
    {
        $uniqId = $this->randomKeys(10);
        $res = Poetries::where('id', $id)->update(['uniq_id' => $uniqId]);
        if ($res) {
            return redirect('/listen');
        }
    }

    public function randomKeys($length)
    {
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        str_shuffle($pattern);
        $str = substr($pattern, 16, $length);

        return md5(time().$str);
    }

    public function index()
    {
        return view('admin/index');
    }
}
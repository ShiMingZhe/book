<?php

namespace App\Http\Controllers;

use App\Models\Poetries;
use App\Models\Task;
use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //查看
    public function listen()
    {
        $poetries = Poetries::paginate(10);
        $files = scandir('../public/qrcode');
        foreach ($poetries as $k => $v) {
            if (in_array($v['uniq_code'].'.png', $files)) {
                $poetries[$k]['qr_url'] = true;
            } else {
                $poetries[$k]['qr_url'] = false;
            }
        }

        return view('admin/listen', ['poetries' => $poetries]);
    }

    //增加
    public function listenAdd()
    {
        $input = Input::except('_token');
        $validator = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'mp3_url' => 'required',
            'detail' => 'required',
        ]);
        if (!$validator->fails()) {
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
        $input = Input::except(['_token', '_url']);
        $validator = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'mp3_url' => 'required',
            'detail' => 'required',
        ]);
        if (!$validator->fails()) {
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
        $res = Poetries::where('id', $id)->update(['uniq_code' => $uniqId]);
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

    //生成二维码
    protected function createQr($uniqId)
    {
        $internalUrl = url('/qr/'.$uniqId);
        $qrCode = new QrCode($internalUrl);
        $qrCode->setSize(300);
        $qrCode->writeFile(__DIR__ . '/../../../public/qrcode/' .$uniqId.'.png');

        return redirect('/listen');
    }
    //下载二维码
    public function downloadQr($uniqId,$name)
    {
        $file = __DIR__ . '/../../../public/qrcode/'.$uniqId.'.png';
        $name = $name.'.png';

        return response()->download($file,$name);
    }
}
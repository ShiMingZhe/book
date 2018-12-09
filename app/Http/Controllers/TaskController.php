<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 18-10-4
 * Time: 下午6:51
 */

namespace App\Http\Controllers;


use App\Models\Poetries;
use App\Models\Task;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        $roleId = $user->first()->role_id;
        $userId = $user->first()->id;
        if ($roleId == '1') {
            $tasks = Task::where('is_pass','0')->get();
            foreach ($tasks as $key => $task) {
                $user = Users::where('id', $task->operator_id)->first();
                if (!empty($user)) {
                    $tasks[$key]->operator = $user->name;
                }
            }

            return view('admin.task.index', ['data' => $tasks]);
        }
        $tasks = Task::where('operator_id', $userId)->get();
        $pass = $reject = $total = 0;
        $tasksDo = [];
        if ($tasks->isEmpty()) {
            return view('admin.task.adminTask', [
                'data' => $tasksDo,
                'total' => 0,
                'pass' => '100%',
                'reject' => '100%',
            ]);
        }
        foreach ($tasks as $key => $task) {
            $user = Users::where('id', $task->operator_id)->first();
            $tasks[$key]->operator = $user->name;
            $total += 1;
            if ($task->is_pass == '1') {
                $pass += 1;
                continue;
            } elseif ($task->is_pass == '2') {
                $reject += 1;
            }
            $tasksDo[] = $tasks[$key];
        }

        return view('admin.task.adminTask', [
            'data' => $tasksDo,
            'total' => count($tasks),
            'pass' => round(($pass/$total)*100).'%',
            'reject' => round(($reject/$total)*100).'%',
        ]);
    }

    public function taskPass($id, $taskId ,$type)
    {
        $task = Task::where('id',$id)->update(['is_pass' => '1']);
        if ($task) {
            switch ($type) {
                case 1:
                    Poetries::where('id', $taskId)->update(['is_available' => '1']);

                    return redirect('/task/admin/index');
            }
        }
    }

    public function taskReject($id, $taskId ,$type)
    {
        $task = Task::where('id',$id)->update(['is_pass' => '2']);
        if ($task) {
            switch ($type) {
                case 1:
                    Poetries::where('id', $taskId)->update(['is_available' => '0']);

                    return redirect('/task/admin/index');
            }
        }
    }
}
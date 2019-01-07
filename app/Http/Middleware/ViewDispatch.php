<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\Task;
use App\Models\Users;
use Closure;
use Illuminate\Support\Facades\Session;

class ViewDispatch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Session::get('user');
        if (empty($user)) {
            view()->share([
                'adminRole' => '',
                'adminName' => '',
                'task' => 0,
                'roleId' => '0',
            ]);
        } elseif (!$user->isEmpty()) {
            $userOne = $user->first();
            $roleId = $userOne->role_id;
            $userId = $userOne->id;
            $tk = 0;
            if ($roleId == '1') {
                $tasks = Task::where('is_pass','0')->get();
                $tk = count($tasks);
            } else {
                $tasks = Task::where('operator_id', $userId)->get();
                foreach ($tasks as $key => $task) {
                    if ($task->is_pass == '2') {
                        $tk += 1;
                    }
                }
            }
            $admin = Role::where('id', $roleId)->first();
            $adminRole = $admin->name;
            $adminName = $userOne->name;
            view()->share([
                'adminRole' => $adminRole,
                'adminName' => $adminName,
                'taskNum' => $tk,
                'roleId' => $roleId,
            ]);
        } else {
            view()->share([
                'adminRole' => '',
                'adminName' => '',
                'task' => 0,
                'roleId' => '0',
            ]);
        }

        return $next($request);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 18-10-2
 * Time: 下午1:04
 */

namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('/admin/login');
    }

    public function validation()
    {
        $input = Input::except('_token');
        $user = Users::where('email',$input['email'])->get();
        if (!$user->isEmpty()) {
            if ($input['password'] == decrypt($user->first()->password)) {
                Session::put('user',$user);

                return redirect('/listen');
            }

            return redirect('/login');
        }

        return redirect('/login');
    }

    public function login_out()
    {
        Session::flush();

        return redirect('/login');
    }

    public function register()
    {
        return view('/admin/register');
    }

    public function register_save()
    {
        $input = Input::except('_token');
        if (!empty($input)) {
            if ($input['password'] != $input['retype_password']) {
                return redirect('/register');
            }
            $input['password'] = encrypt($input['password']);
            $res = Users::create($input);
            if ($res) {
                return redirect("/listen");
            }
        }

        return redirect('/register');
    }
}
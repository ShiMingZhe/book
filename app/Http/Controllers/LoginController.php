<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 18-10-2
 * Time: 下午1:04
 */

namespace App\Http\Controllers;


use App\Models\Users;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        $code = $this->captchaCode();

        return view('/admin/login',['code' => $code]);
    }

    public function validation()
    {
        $input = Input::except('_token');
        $user = Users::where('email',$input['email'])->get();
        if (!$user->isEmpty()) {
            if ($input['password'] == decrypt($user->first()->password) && $input['code'] == Session::get('code')) {
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
        $code = $this->captchaCode();

        return view('/admin/register', ['code' => $code]);
    }

    public function register_save()
    {
        $input = Input::except('_token');
        if (!empty($input)) {
            if ($input['password'] != $input['retype_password'] || $input['code'] != Session::get('code')) {
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

    public function captchaCode()
    {
        $builder = new CaptchaBuilder();
        $code = $builder->build()->inline();
        Session::put('code',$builder->getPhrase());

        return $code;
    }
}
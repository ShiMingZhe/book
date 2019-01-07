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
    /**
     * 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        $code = $this->captchaCode();

        return view('admin.login', ['code' => $code]);
    }

    /**
     * 登录校验
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function validation()
    {
        $input = Input::except('_token');
        $user = Users::where('email',$input['email'])->get();
        if (!$user->isEmpty()) {
            if ($input['password'] != decrypt($user->first()->password)) {
                return redirect('/internal_login')->with(['login_errors' => '登录密码错误']);
            } elseif($input['code'] != Session::get('code')) {
                return redirect('/internal_login')->with(['login_errors' => '登录验证码错误']);
            }
            Session::put('user',$user);

            return redirect('/listen');
        }

        return redirect('/internal_login')->with(['login_errors' => '该用户不存在']);
    }

    /**
     *  退出登录
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login_out()
    {
        Session::flush();

        return redirect('/internal_login');
    }

    /**
     * 注册页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        $code = $this->captchaCode();

        return view('/admin/register', ['code' => $code]);
    }

    /**
     * 保存注册信息
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register_save()
    {
        $input = Input::except('_token');
        if (!empty($input)) {
            if ($input['password'] != $input['retype_password']) {
                return redirect('/register')->with(['errors' => '两次输入的密码不一致']);
            } elseif($input['code'] != Session::get('code')) {
                return redirect('/register')->with(['errors' => '验证码输入不正确']);
            }
            $input['password'] = encrypt($input['password']);
            $res = Users::create($input);
            if ($res) {
                return redirect("/listen");
            }
        }

        return redirect('/register');
    }

    /**
     * 验证码
     * @return string
     */
    public function captchaCode()
    {
        $builder = new CaptchaBuilder();
        $code = $builder->build()->inline();
        Session::put('code',$builder->getPhrase());

        return $code;
    }
}
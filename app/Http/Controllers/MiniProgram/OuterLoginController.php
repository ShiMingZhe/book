<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/31
 * Time: 3:34 PM
 */

namespace App\Http\Controllers\MiniProgram;


use App\Http\Controllers\Controller;
use App\Models\MiniModels\OuterUsers;
use App\Units\Units;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OuterLoginController extends Controller
{
    /**
     * 登录界面
     */
    public function index()
    {
        $code = Units::captchaCode();

        return view('miniprogram.admin.login',['code' => $code]);
    }

    /**
     * 注册界面
     */
    public function register()
    {
        $code = Units::captchaCode();

        return view('miniprogram.admin.register', ['code' => $code]);
    }

    /**
     * 保存数据
     */
    public function registerSave()
    {
        $input = Input::except('_token');
        $message = [
            'name.required' => '用户名不能为空',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'password.confirmed' => '两次密码输入不一致',
            'password.required' => '密码不能为空',
            'password_confirmation.required' => '确认密码不能为空',
            'sex.required' => '性别不能为空',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号无效',
            'code.required' => '验证码不能为空',
        ];
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'sex' => 'required',
            'phone'=>'regex:/^1[34578][0-9]{9}$/',
            'code' => 'required',
        ], $message);
        if ($validator->fails()) {
            return redirect('/outer/register')->with(['errors' => $validator->errors()->all()]);
        }
        if (!empty($input)) {
            if ($input['password'] != $input['password_confirmation']) {
                return redirect('/outer/register')->with(['errors' => ['两次输入的密码不一致']]);
            } elseif($input['code'] != Session::get('code')) {
                return redirect('/outer/register')->with(['errors' => ['验证码输入不正确']]);
            }
            $registerUser = OuterUsers::where('email', $input['email'])->get();
            if ($registerUser->isNotEmpty()) {
                return redirect('/outer/register')->with(['errors' => ['该邮箱已经被注册']]);
            }
            $input['password'] = encrypt($input['password']);
            $res = OuterUsers::create($input);
            if ($res) {
                return redirect("/outer/login");
            }
        }

        return redirect('/outer/register');
    }

    /**
     * 登录校验
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function validation()
    {
        $input = Input::except('_token');
        $user = OuterUsers::where('email',$input['email'])->get();
        if ($user->isNotEmpty()) {
            if ($input['password'] != decrypt($user->first()->password)) {
                return redirect('/outer/login')->with(['login_errors' => '登录密码错误']);
            } elseif($input['code'] != Session::get('code')) {
                return redirect('/outer/login')->with(['login_errors' => '登录验证码错误']);
            }
            Session::put('outerUser',$user);

            return redirect('/outer/brand/index');
        }

        return redirect('/outer/login')->with(['login_errors' => '该用户不存在']);
    }

    /**
     *  退出登录
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginOut()
    {
        Session::flush();

        return redirect('/outer/login');
    }
}
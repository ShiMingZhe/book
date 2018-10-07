<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Poetries;

/**
 * 官网
 */

Route::get('/index', 'IndexController@index');

/**
 * 管理后台
 */

//页面渲染

Route::group(['middleware' => ['web', 'admin.login']], function () {
    Route::get('/mkadmin', 'AdminController@index');
    Route::get('/listen', 'AdminController@listen');
});

Route::group(['middleware' => ['view.dispatch']], function () {
    Route::any('/listenAdd', 'AdminController@listenAdd');
    Route::get('/listen/editor/{poetry_id}', 'AdminController@editor');
    Route::post('/listen/update', 'AdminController@update');

    Route::get('/login', 'LoginController@login');
    Route::post('/login/validation', 'LoginController@validation');
    Route::get('/register', 'LoginController@register');
    Route::post('/register_save', 'LoginController@register_save');
    Route::get('/login_out', 'LoginController@login_out');

    Route::get('/user/admin/index', 'UserController@index');
    Route::post('/user/admin/changeRole', 'UserController@changeRole');

    Route::get('/task/admin/index', 'TaskController@index');
    Route::get('/task/admin/pass/{id}/{task_id}/{type}', 'TaskController@taskPass');
    Route::get('/task/admin/reject/{id}/{task_id}/{type}', 'TaskController@taskReject');
});

Route::any('/captcha/code', 'LoginController@captchaCode');

//API接口
Route::post('/poetry/save', 'AdminApiController@save');
/**
 * 移动端
 */

Route::get('/listen/{uniq_id}', 'MobileController@listenPoetry');
Route::get('/listen/uniqid/{poetry_id}', 'AdminController@createUniqId');
//测试
Route::get('/', function () {
    echo phpinfo();
    //return view('welcome');
});

Route::get('/database', function () {
    $book = Poetries::all();
    dd($book);
});

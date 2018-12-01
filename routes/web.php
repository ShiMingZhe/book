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
use Illuminate\Support\Facades\Route;

/**
 * 官网
 */

Route::get('/index', 'IndexController@index');

/**
 * 管理后台
 */

Route::group(['middleware' => ['web', 'admin.login']], function () {
    Route::get('/mkadmin', 'AdminController@index');
    Route::get('/listen', 'AdminController@listen');
});

Route::get('/createQr/{uniqId}', 'AdminController@createQr');

Route::group(['middleware' => ['view.dispatch']], function () {
    Route::any('/listenAdd', 'AdminController@listenAdd');
    Route::get('/listen/editor/{poetry_id}', 'AdminController@editor');
    Route::post('/listen/update', 'AdminController@update');

    Route::get('/login', 'LoginController@login');
    Route::get('/captcha_code', 'LoginController@captchaCode');
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
 * 移动端API接口
 */
Route::get('/findPoetryContent/{uniq_id}','Mobile\MobileApiController@getPoetryContent');
Route::get('/have_a_look/{offset}','Mobile\MobileApiController@haveALook');

/**
 * webapp
 */

Route::get('/qr/{uniq_id}', 'WebAppController@index');
Route::get('/library', 'WebAppController@library');
Route::get('/library/item', 'WebAppController@library');
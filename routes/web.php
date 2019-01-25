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
    Route::get('/mkadmin', 'LoginController@login');
    Route::get('/listen', 'AdminController@listen');
});
//生成二维码
Route::get('/createQr/{uniqId}', 'AdminController@createQr');
//下载二维码
Route::get('/downloadQr/{uniqId}/{name}', 'AdminController@downloadQr');

Route::group(['middleware' => ['view.dispatch']], function () {
    Route::any('/listenAdd', 'AdminController@listenAdd');
    Route::get('/listen/select/{poetry_id}', 'AdminController@listenContent');
    Route::get('/listen/editor/{poetry_id}', 'AdminController@editor');
    Route::get('/listen/uniqid/{poetry_id}', 'AdminController@createUniqId');
    Route::post('/listen/update', 'AdminController@update');

    Route::get('/internal_login', 'LoginController@login');
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

    Route::get('/datas', 'DatasController@index');
    Route::get('/music/list', 'DatasController@list');
});

Route::any('/captcha/code', 'LoginController@captchaCode');

//API接口
Route::post('/poetry/save', 'AdminApiController@save');

/**
 * 移动端API接口
 */
Route::get('/findPoetryContent/{uniq_id}','Mobile\MobileApiController@getPoetryContent');
Route::get('/have_a_look/{offset}','Mobile\MobileApiController@haveALook');
Route::get('/getAccessToken', 'Mobile\MobileApiController@getAccessToken');
Route::get('/getJsApiTicket/{ticket}', 'Mobile\MobileApiController@getJsApiTicket');
Route::get('/getSignature/{url}', 'Mobile\MobileApiController@getSignature')
    ->where('url', '.*');
Route::get('/search/{keywords}','Mobile\MobileApiController@search');

/**
 * webapp
 */

Route::get('/qr/{uniq_id}', 'WebAppController@index');
Route::get('/library', 'WebAppController@library');//解决在library刷新的问题
Route::get('/poetry/welcome', 'WebAppController@poetryWelcome');

/**
 * 小程序对接
 */
Route::group(['middleware' => ['web']], function () {
    Route::get('/adminBook', 'MiniProgram\OuterLoginController@index');
});
Route::get('/outer/register', 'MiniProgram\OuterLoginController@register');
Route::post('/outer/register', 'MiniProgram\OuterLoginController@registerSave');
Route::get('/outer/login', 'MiniProgram\OuterLoginController@index');
Route::post('/outer/login/validation', 'MiniProgram\OuterLoginController@validation');
Route::get('/outer/loginOut', 'MiniProgram\OuterLoginController@loginOut');

/**
 * 品牌
 */
Route::get('/outer/brand/index', 'MiniProgram\OuterBrandController@index');
Route::get('/outer/brand/editor', 'MiniProgram\OuterBrandController@editorInfo');
Route::post('/outer/brand/editor', 'MiniProgram\OuterBrandController@createInfo');

Route::get('/outer/brand/news', 'MiniProgram\OuterBrandController@news');
Route::get('/outer/brand/news/editor', 'MiniProgram\OuterBrandController@newsEditor');
/**
 * 产品列表
 */
Route::get('/outer/brand/productions', 'MiniProgram\OuterBrandController@productions');
Route::get('/outer/brand/editor/productions', 'MiniProgram\OuterBrandController@editorProductions');
/**
 * 知识付费
 */
Route::get('/outer/knowledge/index', 'MiniProgram\OuterKnowledgeController@index');
/**
 * 用户管理
 */
Route::get('/outer/users/index', 'MiniProgram\OuterUsersController@index');
Route::get('/outer/users/setting/rule', 'MiniProgram\OuterUsersController@settingRule');
Route::get('/outer/users/create/cooperator', 'MiniProgram\OuterUsersController@createCooperator');
Route::post('/outer/users/search/user', 'MiniProgram\OuterUsersController@searchUser');
Route::get('/outer/users/bind/cooperator', 'MiniProgram\OuterUsersController@bindCooperator');
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

Route::get('/', 'Website\IndexController@index');
Route::get('/article', 'Website\ArticleController@article');
Route::get('/knowledge', 'Website\KnowledgeController@knowledge');
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

    //Route::get('/datas', 'DatasController@index');
    Route::get('/music/list', 'DatasController@list');
    //知识付费管理
    Route::get('/outer/knowledge/index', 'MiniProgram\OuterKnowledgeController@list');
    Route::get('/outer/knowledge/create', 'MiniProgram\OuterKnowledgeController@createKnowledge');
    Route::post('/outer/knowledge/create', 'MiniProgram\OuterKnowledgeController@storageKnowledge');
    Route::get('/outer/knowledge/editor/{knowledgeId}', 'MiniProgram\OuterKnowledgeController@editorKnowledge');
    Route::post('/outer/knowledge/update', 'MiniProgram\OuterKnowledgeController@updateKnowledge');
    Route::get('/outer/knowledge/find/detail/{knowledgeId}', 'MiniProgram\OuterKnowledgeController@findKnowledge');
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
Route::post('/outer/brand/editor', 'MiniProgram\OuterBrandController@editorSave');
Route::post('/outer/brand/create', 'MiniProgram\OuterBrandController@createInfo');

/**
 * 品牌动态
 */
Route::get('/outer/brand/news', 'MiniProgram\OuterBrandController@news');
Route::get('/outer/brand/news/create', 'MiniProgram\OuterBrandController@createNews');
Route::post('/outer/brand/news/storage', 'MiniProgram\OuterBrandController@storageNews');
Route::get('/outer/brand/news/editor/{brandId}', 'MiniProgram\OuterBrandController@newsEditor');
Route::post('/outer/brand/news/save', 'MiniProgram\OuterBrandController@newsSave');

/**
 * 产品列表
 */
Route::get('/outer/brand/productions', 'MiniProgram\OuterBrandController@productions');
Route::get('/outer/brand/productions/editor/{productId}', 'MiniProgram\OuterBrandController@editorProductions');
Route::post('/outer/brand/productions/save', 'MiniProgram\OuterBrandController@saveProduct');
Route::get('/outer/brand/productions/create', 'MiniProgram\OuterBrandController@editorProductions');
Route::post('/outer/brand/productions/create', 'MiniProgram\OuterBrandController@createProductions');

/**
 * 知识付费
 */
Route::get('/outer/knowledge/list', 'MiniProgram\OuterKnowledgeController@index');
Route::get('/outer/knowledge/find/detail/{knowledgeId}', 'MiniProgram\OuterKnowledgeController@findOuterKnowledge');
Route::get('/outer/knowledge/bind/{knowledgeId}', 'MiniProgram\OuterKnowledgeController@bindBrandKnowledge');
Route::get('/outer/knowledge/cancel/bind/{knowledgeId}', 'MiniProgram\OuterKnowledgeController@cancelBindBrandKnowledge');

/**
 * 用户管理
 */
Route::get('/outer/users/index', 'MiniProgram\OuterUsersController@index');
Route::get('/outer/users/setting/rule', 'MiniProgram\OuterUsersController@settingRule');
Route::get('/outer/users/create/cooperator', 'MiniProgram\OuterUsersController@createCooperator');
Route::post('/outer/users/search/user', 'MiniProgram\OuterUsersController@searchUser');
Route::get('/outer/users/bind/cooperator', 'MiniProgram\OuterUsersController@bindCooperator');

//小程序API
Route::get('/wx/login/{code}', 'MiniProgram\LoginApiController@wxLogin');

Route::post('/login', 'MiniProgram\LoginApiController@login');
Route::post('/login/out', 'MiniProgram\LoginApiController@loginOut');

Route::post('/user/info', 'MiniProgram\BrandApiController@getAdminUserInfo');
Route::post('/brand/info', 'MiniProgram\BrandApiController@getBrandInfo');
Route::post('/brand/news', 'MiniProgram\BrandApiController@getBrandNews');
Route::post('/brand/products', 'MiniProgram\BrandApiController@getProductList');

//官网后台
Route::get('/website/index', 'Website\IndexController@index');
<?php
/**
 * Created by PhpStorm.
 * User: shimingzhe
 * Date: 2018/12/16
 * Time: 8:35 AM
 */

namespace App\constants;


use MyCLabs\Enum\Enum;

class WeixinAPI extends Enum
{
    const WEIXIN_ACCESS_TOKEN = 'https://api.weixin.qq.com/cgi-bin/token';
    const WEIXIN_JSAPI_TICKET = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket';
}
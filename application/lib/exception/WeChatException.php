<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/11 0011
 * Time: 下午 9:35
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = '微信服务器接口调用失败';
    public $errorCode = '999';
}
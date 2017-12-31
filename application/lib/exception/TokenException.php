<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 10:32
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = '10001';
}
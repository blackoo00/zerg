<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/20 0020
 * Time: 下午 9:40
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}
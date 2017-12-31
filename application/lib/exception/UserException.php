<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 下午 9:01
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = '60000';
}
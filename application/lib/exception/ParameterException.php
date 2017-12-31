<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/8/22 0022
 * Time: 下午 9:02
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}
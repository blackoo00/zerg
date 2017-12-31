<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/5 0005
 * Time: 下午 10:14
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主题不存在，请检查主题ID';
    public $errorCode = '30000';
}
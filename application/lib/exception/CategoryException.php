<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/7 0007
 * Time: 下午 9:35
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '指定类目不存在，请检查参数';
    public $errorCode = 50000;
}
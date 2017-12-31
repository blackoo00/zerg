<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/6 0006
 * Time: 下午 11:00
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $code = 404;
    public $msg = '商品不存在，请检查参数';
    public $errorCode = 20000;
}
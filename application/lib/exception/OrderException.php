<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/26 0026
 * Time: 下午 9:07
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}
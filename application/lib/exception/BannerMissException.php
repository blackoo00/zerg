<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/8/21 0021
 * Time: 下午 10:32
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $errorCode = 40000;
}
<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/8 0008
 * Time: 下午 10:30
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code还想获取Token,做梦！'
    ];
}
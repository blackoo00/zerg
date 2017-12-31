<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/6 0006
 * Time: 下午 10:43
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];

    protected $message = [
        'count' => 'count必须是正整数'
    ];
}
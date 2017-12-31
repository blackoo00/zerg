<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/8/16 0016
 * Time: 下午 8:15
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected  $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected $message = [
        'id' => 'id必须是正整数'
    ];
}
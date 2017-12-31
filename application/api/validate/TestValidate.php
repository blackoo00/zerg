<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/8/9 0009
 * Time: 下午 8:39
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected  $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];
}
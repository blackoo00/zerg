<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/10/18 0018
 * Time: 下午 8:54
 */

namespace app\api\validate;


class PagingParameter extends BaseValidate
{
    protected  $rule = [
        'page' => 'isPositiveInteger',
        'size' => 'isPositiveInteger'
    ];

    protected $message = [
        'page' => '分页参数必须是正整数',
        'size' => '分页参数必须是正整数'
    ];
}
<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 3:38
 */

namespace app\api\validate;


class UserInfo extends BaseValidate
{
    protected $rule = [
        'extend' => 'require|isNotEmpty',
        'nickname' => 'require|isNotEmpty',
        'avatarUrl' => 'require|isNotEmpty',
    ];
}
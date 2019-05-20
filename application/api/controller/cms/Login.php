<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/12/9 0009
 * Time: 下午 12:13
 */

namespace app\api\controller\cms;


use app\api\service\AppToken;
use app\api\validate\AppTokenGet;

class Login
{
    /**
     * 第三方应用获取令牌
     * @url /app_token?
     * @POST ac=:ac se=:secret
     */
    public function getAppToken($ac = '', $se = '', $type = ''){
        (new AppTokenGet())->goCheck();
        $app = new AppToken();
        $token = $app->get($ac,$se);
        return [
            'token' => $token,
            'status' => 'ok',
            'currentAuthority' => 'admin',
            'type' => $type
        ];
    }
}
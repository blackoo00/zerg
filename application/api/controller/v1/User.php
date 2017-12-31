<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 3:36
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\UserInfo;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;

class User extends BaseController
{
    public function updateUserInfo(){
        $validate = new UserInfo();
        $validate->goCheck();
        $data = $validate->getDataByRule(input('post.'));
        UserModel::updateUserInfo($data);
        return json(new SuccessMessage(),201);
    }
}
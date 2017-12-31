<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 2017/12/17
 * Time: 13:43
 */

namespace app\api\controller\cms;

use app\api\controller\BaseController;
use \app\api\model\User as UserModel;

class User extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'statistic,getList']
    ];

    public function statistic(){
        $count = (new UserModel())->count();
        return $count;
    }

    public function getList(){
        return (new UserModel())->field(['nickname','avatarUrl','id'])->select();
    }
}
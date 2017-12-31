<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/22 0022
 * Time: 下午 9:59
 */

namespace app\api\controller;


use app\api\service\Token;
use think\Controller;
use app\api\service\Token as TokenService;


class BaseController extends Controller
{
    protected function checkPrimaryScope(){
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope(){
        TokenService::needExclusiveScope();
    }

    protected function checkSuperScope(){
        TokenService::needSuperScope();
    }
}
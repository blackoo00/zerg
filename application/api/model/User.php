<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/11 0011
 * Time: 下午 8:18
 */

namespace app\api\model;


use app\api\service\Token;

class User extends BaseModel
{
    public function address(){
        return $this->hasOne('UserAddress','user_id','id');
    }

    public static function getByOpenID($openid){
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }

    public static function updateUserInfo($data){
        $uid = Token::getCurrentUid();
        self::update($data,['id' => $uid]);
    }
}
<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/5 0005
 * Time: 下午 9:39
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];
    protected $message = [
        'ids' => 'ids参数必须是以逗号分隔的多个正整数'
    ];
    //value = id1,id2,id3...
    protected function checkIDs($value){
        $values = explode(',',$value);
        if(empty($value)){
            return false;
        }
        foreach ($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}
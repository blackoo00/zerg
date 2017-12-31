<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/8/16 0016
 * Time: 下午 8:54
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取http传入的参数
        //对这些参数做校验
        $requset = Request::instance();
        $params = $requset->param();

        $result = $this->batch()->check($params);
        if(!$result){
            $e = new ParameterException([
                'msg' => $this->error,
            ]);
            throw $e;
        }else{
            return true;
        }
    }
    protected  function isPositiveInteger($value, $rule = '',$data = '',$field = ''){
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }else{
            return false;
//            return $field.'必须是正整数';
        }
    }

    //没有使用TP的正则验证，集中在一处方便以后修改
    //不推荐使用正则，因为复用性太差
    //手机号的验证规则
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    protected function isNotEmpty($value,$rule = '',$data = '',$field = ''){
        if(empty($value)){
//            return $field . '不允许为空';
            return false;
        }else{
            return true;
        }
    }

    public function getDataByRule($arrays){
        if(array_key_exists('user_id',$arrays) |
            array_key_exists('uid',$arrays)
        ){
            throw new ParameterException([
                'msg' => '参数中半酣由非法对参数名user_id或者uid'
            ]);
        }

        $newArray = [];
        foreach ($this->rule as $key => $value){
            if(!is_array($arrays[$key]) && strpos($arrays[$key],config('setting.img_prefix')) !== false){
                $arrays[$key] = str_replace(config('setting.img_prefix'),'',$arrays[$key]);
            }
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }
}
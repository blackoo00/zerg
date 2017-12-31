<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 2017/12/19
 * Time: 15:48
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class ProductUpdate extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isNotEmpty',
        'name' => 'require|isNotEmpty',
        'stock' => 'require|isNotEmpty',
        'main_img_url' => 'require|isNotEmpty',
        'is_on_sale' => 'require|isNotEmpty',
        'details' => 'require',
        'properties' => 'checkProperties',
    ];

    protected $singleRule = [
        'name' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty',
        'product_id' => 'require|isPositiveInteger',
    ];

    protected function checkProperties($values){
        if(!is_array($values)){
            throw new ParameterException([
                'msg' => '属性参数不正确'
            ]);
        }

        if(empty($values)){
            return true;
        }

        foreach ($values as $value){
            $this->checkProduct($value);
        }

        return true;
    }

    protected function checkProduct($value){
        $validate = new BaseValidate($this->singleRule);
        $result = $validate->check($value);
        if(!$result){
            throw new ParameterException([
                'msg' => '属性参数不正确'
            ]);
        }
    }
}
<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/22 0022
 * Time: 下午 10:09
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    protected $products = [
        [
            'product_id' => 1,
            'count' => 1
        ],
        [
            'product_id' => 2,
            'count' => 2
        ]
    ];
    protected $rule = [
        'products' => 'checkProducts'
    ];

    protected $singleRule = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger',
    ];

    protected function checkProducts($values){
        if(!is_array($values)){
            throw new ParameterException([
                'msg' => '商品参数不正确'
            ]);
        }

        if(empty($values)){
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
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
                'msg' => '商品参数不正确'
            ]);
        }
    }
}
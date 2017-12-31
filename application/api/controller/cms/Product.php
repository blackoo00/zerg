<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 2017/12/17
 * Time: 14:59
 */

namespace app\api\controller\cms;

use app\api\controller\BaseController;
use app\api\model\Product as ProductModel;
use app\api\model\ProductProperty;
use app\api\validate\IDMustBePostiveInt;
use app\api\validate\ProductUpdate;
use app\lib\exception\SuccessMessage;
use app\api\service\TxFile as TxFileService;


class Product extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'statistic,getList,getDetail']
    ];

    public function statistic(){
        $product = new ProductModel();
        return [
            'total_count' => $product->count(),
            'on_sale' => $product->count('is_on_sale')
        ];
    }
    public function getList($page = 1, $size = 10, $key = '',$cid = ''){
        return ProductModel::getSummaryByPage($page,$size,$key,$cid);
    }
    public function getDetail($id){
        (new IDMustBePostiveInt())->goCheck();
        return ProductModel::getProductDetail($id);
    }
    public function updateData(){
        $validate = new ProductUpdate();
        $validate->goCheck();
        $data = $validate->getDataByRule(input('post.'));
        if(!empty($data['properties'])){
            (new ProductProperty())->saveAll($data['properties']);
        }
        unset($data['properties']);
        ProductModel::updateProdInfo($data);
        return json(new SuccessMessage(),201);
    }

    public function uploadProductLogo(){
        $res = (new TxFileService())->thumbUpload($_FILES[array_keys($_FILES)[0]]['tmp_name']);
        return stripslashes($res);
    }

    public function uploadProductDetailsImg(){
        $res = (new TxFileService())->thumbUpload($_FILES[array_keys($_FILES)[0]]['tmp_name']);
        $data = array();
        $data['data']['link']= stripslashes($res);
        return $data;
    }
}
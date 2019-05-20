<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 2017/12/18
 * Time: 15:59
 */

namespace app\api\controller\cms;


use app\api\controller\BaseController;
use app\api\model\Category as CategoryModel;

class Category extends BaseController
{
    // protected $beforeActionList = [
    //     'checkPrimaryScope' => ['only' => 'statistic,getList']
    // ];

    public function getList($page = 1, $size = 10){
        $pagingCats = CategoryModel::getSummaryByPage($page,$size);
        return $pagingCats->toArray();
    }
}
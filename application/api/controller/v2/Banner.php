<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/8/7 0007
 * Time: 下午 9:57
 */

namespace app\api\controller\v2;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * 获取制定id的banner信息
     * $url /banner/:id
     * @http GET
     * $id banner对id号
     *
     */
    public function getBanner($id){
       return 'This is V2 Version';
    }
}
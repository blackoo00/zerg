<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 上午 11:07
 */

namespace app\api\model;


class ThirdApp extends BaseModel
{
    public static function check($ac, $se){
        $app = self::where('app_id','=',$ac)
            ->where('app_secret','=',$se)
            ->find();
        return $app;
    }
}
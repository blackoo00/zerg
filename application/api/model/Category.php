<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/7 0007
 * Time: 下午 9:28
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
    public static function getSummaryByPage($page, $size){
        $pagingData = self::order('sort desc')->order('id asc')->with('img')
            ->paginate($size,false,['page' => $page]);
        return $pagingData;
    }
}
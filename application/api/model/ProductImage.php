<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/15 0015
 * Time: 下午 9:59
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id','delete_time','product_id'];

    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }
}
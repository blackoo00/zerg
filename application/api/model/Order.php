<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/29 0029
 * Time: 下午 8:54
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['user_id','delete_time','update_time'];
    protected $autoWriteTimestamp = true;

    public function user(){
        return $this->belongsTo('User','user_id','id')->bind('nickname');
    }

    public function getSnapItemsAttr($value){
        if(empty($value)){
            return null;
        }
        return json_decode($value);
    }
    public function getSnapAddressAttr($value){
        if(empty($value)){
            return null;
        }
        return json_decode($value);
    }

    public static function getSummaryByUser($uid, $page = 1, $size = 15){
        $pagingData = self::where('user_id','=',$uid)
            ->order('create_time desc')
            ->paginate($size,true,['page' => $page]);
        return $pagingData;
    }

    public static function getSummaryByPage($page = 1, $size = 20, $key = ''){
        $pagingData = self::order('create_time desc')->with('user')
            ->where('order_no','like','%'.$key.'%')
            ->paginate($size,false,['page' => $page]);
        return $pagingData;
    }

    public static function getOrderDetail($id){
        return self::get($id);
    }
}
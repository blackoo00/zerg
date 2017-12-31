<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/3 0003
 * Time: 下午 10:42
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = [
        'delete_time','main_img_id','pivot','from','category_id',
        'create_time','update_time','cat'];

    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    public function imgs(){
        return $this->hasMany('ProductImage','product_id','id');
    }

    public function properties(){
        return $this->hasMany('ProductProperty','product_id','id');
    }
    public function cat(){
        return $this->belongsTo('Category','category_id','id')->bind(['cat_name' => 'name']);
    }

    public static function getMostRecent($count){
        $product = self::limit($count)->order('create_time desc')->select();
        return $product;
    }

    public static function getProductsByCategoryID($categoryID){
        $products = self::where('category_id','=',$categoryID)
            ->select();
        return $products;
    }

    public static function getProductDetail($id){
        $product = self::with([
            'imgs' => function($query){
                $query->with(['imgUrl'])
                ->order('order','asc');
            }
        ])
            ->with(['properties'])
            ->with('cat')
            ->find($id);
        return $product;
    }
    public static function getSummaryByPage($page, $size,$key,$cid){
        $where = [];
        if($key){
            $where['name'] = array('like','%'.$key.'%');
        }
        if($cid){
            $where['category_id'] = $cid;
        }
        $pagingData = self::order('id asc')->with('imgs,cat')
            ->where($where)
            ->paginate($size,false,['page' => $page]);
        return $pagingData;
    }
    public static function updateProdInfo($data){
        self::update($data);
    }
}
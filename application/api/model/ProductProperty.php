<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/15 0015
 * Time: 下午 10:01
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];

    protected $autoWriteTimestamp = 'time';

}
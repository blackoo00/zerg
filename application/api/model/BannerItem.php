<?php

namespace app\api\model;

class BannerItem extends BaseModel
{
    protected $visible = ['key_word','type','img'];
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}

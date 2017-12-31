<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/10/12 0012
 * Time: 11:09
 */

namespace app\api\controller\cms;

use app\api\controller\BaseController;
use app\api\service\TxFile as TxFileService;

class TxFile extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => [
            'only' => 'getSign,uploadThumbImg'
        ]
    ];

    public function getSign(){
        return (new TxFeileService())->getSign();
    }

    public function uploadThumbImg(){
        $res = (new TxFileService())->thumbUpload($_FILES[array_keys($_FILES)[0]]['tmp_name']);
        $test = array();
        $test['data']['link']= stripslashes($res);
        return $test;
    }
}
<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/10/12 0012
 * Time: 9:11
 */

namespace app\api\service;

// use QCloud\Cos\Api;
use Qcloud\Cos\Client;
use think\Image;
use think\Loader;

Loader::import('TxFile.include',EXTEND_PATH,'.php');
class TxFile
{
    private $config;
    private $bucket = 'zerg';
    private $thumbWeight = 600;
    private $thumbHeight = 600;
    function __construct()
    {
        // $this->config = array(
        //     'app_id' => '1251466962',
        //     'secret_id' => 'AKIDwmYFnCjUPCvWzIuiuFWjrqgR4Zt4o91B',
        //     'secret_key' => 'BDA0hEar5BAzfEkAZpvwrdFhzDKJ9qQv',
        //     'region' => 'sh',
        //     'timeout' => 60,
        //     'bucket' => 'zerg-1251466962'
        // );
        $this->config = array(
            'region' => 'sh',
            'credentials' => array(
                'secretId' => 'AKIDwmYFnCjUPCvWzIuiuFWjrqgR4Zt4o91B',
                'secretKey' => 'BDA0hEar5BAzfEkAZpvwrdFhzDKJ9qQv',
            ),
        );
    }
    public function thumbUpload($tmp_name){
        $image = Image::open($tmp_name);
        $temp_src = './thumb.'.$image->type();
        $image->thumb($this->thumbWeight, $this->thumbHeight)->save($temp_src);
        $res = self::upload($temp_src,$image->type());
        return $res['ObjectURL'];
    }


    public function upload($src,$suffix = 'jpg'){
        // $cosApi = new Api($this->config);
        $cat_name = date('Y').date('m').date('d');
        $dst = $cat_name . '/' . time().rand(0,100).'.'.$suffix;
        // $res = $cosApi->upload($this->bucket, $src, $dst);
        $cosClient = new Client($this->config);
        $bucket = 'zerg-1251466962';
        try {
            $result = $cosClient->putObject(array(
                'Bucket' => $bucket,
                'Key' => $dst,
                'Body' => fopen($src, 'rb')
            ));
            // print_r($result->toArray());
            return $result->toArray();
        } catch (\Exception $e) {
            echo($e);
        }
        // return $res;
    }

//    public function upload2($con,$suffix = 'jpg'){
//        $cosApi = new Api($this->config);
//        $cat_name = date('Y').date('m').date('d');
//        $dst = $cat_name . '/' . time().rand(0,100).'.'.$suffix;
//        $res = $cosApi->uploadBuffer($this->bucket, $con, $dst);
//        return $res;
//    }

    public function getSign(){
        $cosApi = new Api($this->config);
        $sign = $cosApi->getSignature($this->bucket);
        return $sign;
    }
}
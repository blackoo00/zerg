<?php
    namespace app\api\service;

    use think\Loader;
    // Loader::import('Cos.Client',EXTEND_PATH,'.Api.php');
    // require 'vendor/autoload.php';
    use Qcloud\Cos\Client;

    class TxFile2{
        public function upload(){
            $cosClient = new Client(array(
                'region' => 'sh', #地域，如ap-guangzhou,ap-beijing-1
                'credentials' => array(
                    'secretId' => 'AKIDwmYFnCjUPCvWzIuiuFWjrqgR4Zt4o91B',
                    'secretKey' => 'BDA0hEar5BAzfEkAZpvwrdFhzDKJ9qQv',
                ),
            ));
            $bucket = 'zerg-1251466962';
            $key = 'a.txt';
            $local_path = "E:/a.txt";
            try {
                $result = $cosClient->putObject(array(
                    'Bucket' => $bucket,
                    'Key' => $key,
                    'Body' => fopen($local_path, 'rb')
                ));
                print_r($result);
            } catch (\Exception $e) {
                echo($e);
            }
        }
    }
?>
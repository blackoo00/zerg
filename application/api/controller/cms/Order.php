<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 2017/12/17
 * Time: 15:37
 */

namespace app\api\controller\cms;

use app\api\controller\BaseController;
use app\api\model\Order as OrderModel;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'statistic,getList']
    ];

    public function test()
    {
        // 指明给谁推送，为空表示向所有在线用户推送
        $to_uid = "";
        // 推送的url地址，使用自己的服务器地址
        $push_api_url = config("secure.workerman_url");
        $post_data = array(
            "type" => "publish",
            "content" => "这个是推送的测试数据",
            "to" => $to_uid,
        );
        $return = curl_post($push_api_url,$post_data);
        var_export($return);
    }

    public function statistic()
    {
        $order = new OrderModel();
        return [
            'order_status1' => $order->where(['status' => 1])->count(),
            'order_status2' => $order->where(['status' => 2])->count(),
            'order_status3' => $order->where(['status' => 3])->count(),
            'order_status4' => $order->where(['status' => 4])->count(),
        ];
    }

    public function getList($page = 1, $size = 10, $key = '')
    {
        return OrderModel::getSummaryByPage($page, $size, $key);
    }
}
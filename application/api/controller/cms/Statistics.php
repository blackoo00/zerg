<?php

namespace app\api\controller\cms;

use app\api\controller\BaseController;

class Statistics extends BaseController{
    public function getData(){
        return [
            'prod_data' => [
                'total_count' => 1,
                'on_sale' => 1
            ],
            'order_data' => [
                'order_status1' => 1,
                'order_status2' => 1,
                'order_status3' => 1,
                'order_status4' => 1,
            ]
            ];
    }
}
?>
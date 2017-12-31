<?php

namespace app\push\controller;

use think\worker\Server;

class Worker extends Server
{
    protected $socket = 'http://0.0.0.0:2121';

    /**
     * 收到信息
     * @param $connection
     * @param $data
     */
    public function onMessage($http_connection, $data)
    {
//        global $uidConnectionMap;
//        $_POST = $_POST ? $_POST : $_GET;
//        // 推送数据的url格式 type=publish&to=uid&content=xxxx
//        switch(@$_POST['type']){
//            case 'publish':
//                global $sender_io;
//                $to = @$_POST['to'];
//                $_POST['content'] = htmlspecialchars(@$_POST['content']);
//                // 有指定uid则向uid所在socket组发送数据
//                if($to){
//                    $sender_io->to($to)->emit('new_msg', $_POST['content']);
//                    // 否则向所有uid推送数据
//                }else{
//                    $sender_io->emit('new_msg', @$_POST['content']);
//                }
//                // http接口返回，如果用户离线socket返回fail
//                if($to && !isset($uidConnectionMap[$to])){
//                    return $http_connection->send('offline');
//                }else{
//                    return $http_connection->send('ok');
//                }
//        }
        return $http_connection->send('fail');
    }
    /**
     * 当连接建立时触发的回调函数
     * @param $connection
     */
    public function onConnect($connection)
    {

    }
    /**
     * 向所有验证的用户发送消息
     */
    public function sendAllMessage($message){
//        $worker = $this->worker;
//        foreach($worker->connections as $conn)
//        {
//            $conn->send($message);
//        }
        global $worker;
        foreach($worker->uidConnections as $connection)
        {
            $connection->send($message);
        }
    }
    /**
     * 当连接断开时触发的回调函数
     * @param $connection
     */
    public function onClose($connection)
    {

    }

    /**
     * 当客户端的连接上发生错误时触发
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onError($connection, $code, $msg)
    {
        echo "error $code $msg\n";
    }

    /**
     * 每个进程启动
     * @param $worker
     */
    public function onWorkerStart($worker)
    {

    }
}
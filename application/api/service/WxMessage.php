<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 下午 7:30
 */

namespace app\api\service;


use think\Exception;

class WxMessage
{
    private $sendUrl = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?" .
    "access_token=%s";
    private $touser ;
    private $color = 'balck';

    protected $tplID;
    protected $page;
    protected $formID;
    protected $data;
    protected $emphasisKeyWord;

    function __construct()
    {
        $accessToken = new AccessToken();
        $token = $accessToken->get();
        $this->sendUrl = sprintf($this->sendUrl,$token);
    }

    // 开发工具中拉起的微信支付prepay_id是无效的，需要在真机上拉起支付
    protected function sendMessage($openID){
        $data = [
            'touser' => $openID,
            'template_id' => $this->tplID,
            'page' => $this->page,
            'form_id' => $this->formID,
            'data' => $this->data,
            'emphasis_keyword' => $this->emphasisKeyWord
        ];
        $result = curl_post($this->sendUrl,$data);
        $result = json_decode($result,true);
        if($result['errcode'] == 0){
            return true;
        }else{
            throw new Exception('模板消息发送失败,  ' . $result['errmsg']);
        }
    }
}
<?php
/**
 * Created by Robin.
 * User: Administrator
 * Date: 2017/9/11 0011
 * Time: 下午 8:31
 */

return [
    //  +---------------------------------
    //  微信相关配置
    //  +---------------------------------

    // 小程序app_id
    'app_id' => 'wx8e0d0b1cee7ab079',
    // 小程序app_secret
    'app_secret' => '1047fb50b09f593bb8f9269a914e78b6',

    // 微信使用code换取用户openid及session_key的url地址
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",

    // 微信获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
        "grant_type=client_credential&appid=%s&secret=%s",

];
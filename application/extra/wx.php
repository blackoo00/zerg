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
    'app_id' => 'wxe2e79c3ca40beb4f',
    // 小程序app_secret
    'app_secret' => '95eaf1e246dbcc3bf0a222efbba0af19',

    // 微信使用code换取用户openid及session_key的url地址
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",

    // 微信获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
        "grant_type=client_credential&appid=%s&secret=%s",

];
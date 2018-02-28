<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');

Route::get('api/:version/theme', 'api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id', 'api/:version.Theme/getComplexOne');

Route::group('api/:version/product',function (){
   Route::get('/by_category','api/:version.Product/getAllInCategory');
   Route::get('/:id','api/:version.Product/getOne', [], ['id' => '\d+']);
   Route::get('/recent','api/:version.Product/getRecent');
});

Route::get('api/:version/category/all', 'api/:version.Category/getAllCategories');

//Token
Route::post('api/:version/token/user', 'api/:version.Token/getToken');

Route::post('api/cms/token/app', 'api/cms.Login/getAppToken');
Route::post('api/:version/token/verify', 'api/:version.Token/verifyToken');

//Address
Route::post('api/:version/address', 'api/:version.Address/createOrUpdateAddress');
Route::get('api/:version/address', 'api/:version.Address/getUserAddress');
Route::get('api/:version/test', 'api/:version.Address/test');

//Order
//不想把所有查询都写在一起，所以增加by_user，很好的REST与RESTFul的区别
Route::post('api/:version/order', 'api/:version.Order/placeOrder');
Route::get('api/:version/order/by_user', 'api/:version.Order/getSummaryByUser');
Route::get('api/:version/order/:id', 'api/:version.Order/getDetail',
    [],['id' => '\d+']);
Route::get('api/:version/order/paginate', 'api/:version.Order/getSummary');
Route::put('api/:version/order/delivery', 'api/:version.Order/delivery');


//Pay
Route::post('api/:version/pay/pre_order', 'api/:version.Pay/getPreOrder');
Route::post('api/:version/pay/notify', 'api/:version.Pay/receiveNotify');
Route::post('api/:version/pay/re_notify', 'api/:version.Pay/redirectNotify');

//User
Route::post('api/:version/user/wx_info', 'api/:version.User/updateUserInfo');

//CMS
Route::group('api/cms/user',function (){
    Route::get('/static','api/cms.User/statistic');
    Route::get('/list','api/cms.User/getList');
});
Route::group('api/cms/prod',function (){
    Route::get('/static','api/cms.Product/statistic');
    Route::get('/list','api/cms.Product/getList');
    Route::get('/detail/:id','api/cms.Product/getDetail', [], ['id' => '\d+']);
    Route::post('/update','api/cms.Product/updateData');
    Route::post('/up_prod_logo','api/cms.Product/uploadProductLogo');
    Route::post('/up_prod_details_img','api/cms.Product/uploadProductDetailsImg');
});
Route::group('api/cms/order',function (){
    Route::get('/static','api/cms.Order/statistic');
    Route::get('/list','api/cms.Order/getList');
    Route::post('/test','api/cms.Order/test');
    Route::post('/:id','api/cms.Order/getDetail', [], ['id' => '\d+']);
});
Route::group('api/cms/cats',function (){
    Route::get('/list','api/cms.Category/getList');
});

//File
Route::get('api/cms/get_sign','api/cms.TxFile/getSign');
Route::post('api/cms/up_img', 'api/cms.TxFile/uploadThumbImg');


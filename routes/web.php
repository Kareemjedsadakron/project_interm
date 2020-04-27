<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('gmail-send');
});
          

Route::get('users', 'UserChartController@index');
//ใบสั่งงาน
Route::resource('/','OrderController');
Route::get('/user/{id}', 'OrderController@landding');
Route::get('/logout', 'OrderController@logout');
Route::get('/order/index', 'OrderController@index');
Route::get("/order/create", "OrderController@create");
Route::post('/order', 'OrderController@store');
Route::get('/order/{id}', 'OrderController@show');
Route::get('/order/worker/{id}', 'OrderController@worker');
Route::get('/order/status/{id}', 'OrderController@status');
Route::get('/order/check_job/{id}', 'OrderController@check_job');
Route::get("/order/{id}/edit", "OrderController@edit");
Route::put("/order/{id}", "OrderController@update");
Route::put("/order/worker/{id}", "OrderController@update_worker");
Route::put("/order/status/{id}", "OrderController@update_status");
Route::put("/order/check_job/{id}", "OrderController@update_check_job");
Route::delete('/order/{id}', 'OrderController@destroy');
Route::put("/order/delete/{id}", "OrderController@delete");
//ประัติการลบใบสั่งงาน
Route::get('/historyjob', 'HistoryjobController@index');
Route::get('/historyjob/{id}', 'HistoryjobController@show');
//ซัพพอตลูกค้า
Route::get('/support', 'SupportController@index');
Route::get("/support/create", "SupportController@create");
Route::post('/support', 'SupportController@store');
Route::get('/support/{id}', 'SupportController@show');
Route::get("/support/{id}/edit", "SupportController@edit");
//อัปเดรตคำร้องเรียน
Route::get("/support/{id}/editupdate", "SupportController@editupdate");
Route::put("/support/{id}", "SupportController@update");
Route::put("/support/image_update/{id}", "SupportController@update_image");
Route::put("/support/receive_complaints/{id}", "SupportController@update_receive_complaints");
Route::delete('/support/{id}', 'SupportController@destroy');
Route::put("/support/delete/{id}", "SupportController@delete");

Route::post('/image', 'ImageUploadController@store');
//ประวัติการลบการซัพพอตลูกค้า
Route::get('/historysupport', 'HistorysupportController@index');
Route::get('/historysupport/{id}', 'HistorysupportController@show');
//ส่วนของการลบ ใบสั่งงานให้เป็นประวิติการลบ
Route::resource('/orderdetail','orderdetailController');
Route::post('/orderdetail', 'orderdetailController@store');
Route::get('/orderdetail/{id}', 'orderdetailController@show');
Route::get("/orderdetail/{id}/edit", "orderdetailController@edit");
Route::put("/orderdetail/{id}", "orderdetailController@update");
Route::delete('/orderdetail/{id}', 'orderdetailController@destroy');
//PDFpdforder
Route::get('/pdf/{id}', 'PDFController@pdf');
// img
Route::get('form','FormimgController@create');
Route::post('form','FormimgController@store');

Route::get('/', 'FormController@index');
Route::post('upload_data', 'FormController@store');

//gmail
Route::get('send-mail','MailSend@mailsend');
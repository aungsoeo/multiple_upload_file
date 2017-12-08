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
Route::get('/index',function(){
	return view('add_invoice');
});
Route::get('/show',function(){
	return view('showinvoice');
});
Route::get('edit/{id}','InvoiceController@edit');
Route::get('detail/{id}','InvoiceController@showdetail');
Route::get('/showinvoice','InvoiceController@showinv');
Route::post('/save','InvoiceController@save');
Route::post('/update','InvoiceController@update');


// for product
Route::get('/add_product',function(){
	return view('product.add');
});

Route::get('/show',function(){
	return view('product.add_detail');
});
Route::get('/show_category',function(){
	return view('product.edit_category');
});
Route::get('sub_cat/{id}','ProductController@sub_cat');
Route::get('edit/{id}','ProductController@edit');
Route::post('/save','ProductController@save');
Route::post('/product_save','ProductController@save_product');
Route::get('SubCategories/{id}','ProductController@SubCategories');


// for photo
Route::get('/photo','MultipleUploadController@photo');
Route::post('/saveall','MultipleUploadController@save');
// Route::post('/saveall', function() {
// 	'uses' => 'MultipleUploadController@save',
// 	'as' => 'post.saveall'
// });
Route::get('/productlist','MultipleUploadController@show');
Route::get('/showphoto',function(){
	return view('photo.show');
});
Route::get('edit/{id}','MultipleUploadController@edit');
Route::post('updatephoto','MultipleUploadController@update');

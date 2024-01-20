<?php

Route::get('/', 'HomeController@index')->name('get.user.home');

Route::get('/san-pham/{brand}', 'Product\BrandController@index')->name('get.brand.index');

Route::get('/search', 'Search\SearchController@index')->name('get.user.search');
//Route::get('/product-detail', 'Product\ProductController@index');
Route::get('/product/{id}', 'Product\ProductController@getProduct')->name('get.user.get_product_detail');
Route::get('/add-to-cart/{id}', 'Product\ProductController@getAddToCart')->name('get.product.add_to_cart');
Route::get('/buy-now/{id}', 'Product\ProductController@buyNow')->name('get.product.buy_now');
Route::get('/shopping-cart', 'Product\ProductController@getCart')->name('get.product.get_shopping_cart');
Route::get('/remove-to-cart/{id}', 'Product\ProductController@removeToCart')->name('get.product.remove_to_cart');
Route::get('/remove-one-to-cart/{id}', 'Product\ProductController@removeOneToCart')->name('get.product.remove_on_to_cart');

Route::get('/cart', 'Cart\CartController@index')->name('get.cart.get_cart');

Route::get('/register', 'Auth\RegisterController@register')->name('get.user.register');
Route::post('/register', 'Auth\RegisterController@postRegister')->name('post.user.register');

Route::get('/login', 'Auth\LoginController@login')->name('get.user.login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('post.user.login');

Route::get('login/google', 'Auth\LoginController@loginGoogle')->name('get.user.login_google');
Route::get('login/google/callback', 'Auth\LoginController@loginGoogleCallback');

Route::get('login/facebook', 'Auth\LoginController@loginFacebook')->name('get.user.login_facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@loginFacebookCallback');

Route::get('/logout', 'Auth\LoginController@logout')->name('get.user.logout');


Route::get('/ajax-search', 'AjaxController@getProductAjax');

Route::post('/order', 'BillController@order')->name('post.cart.order');

Route::group(['middleware'=> 'user.jwt'], function ()
{
    Route::get('/user-info', 'Auth\UserController@index')->name('get.user.get_info');
    Route::get('/user-password', 'Auth\UserController@password')->name('get.user.get_password');
    Route::post('/user-password/{id}', 'Auth\UserController@updatePassword')->name('get.user.update_password');
    Route::post('/update-info/{id}', 'Auth\UserController@updateInfo')->name('get.user.update_info');
    Route::post('/update-avatar/{id}', 'Auth\UserController@updateAvatar')->name('get.user.update_avatar');
    Route::get('/user-purchase/{id}', 'Auth\UserController@purchase')->name('get.user.get_purchase');
    Route::post('/bill-cancel/{id}', 'Auth\UserController@updateBillCancel')->name('get.user.update_bill_cancel');
    Route::post('/bill-again/{id}', 'Auth\UserController@updateBillAgain')->name('get.user.update_bill_again');
});

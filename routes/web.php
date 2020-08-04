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

Route::get('/', 'HomeController@index')->name('get.user.home');

Route::get('/phone', 'Product\PhoneController@index');

Route::get('/search', 'Search\SearchController@index');
Route::get('/product-detail', 'Product\ProductController@index');
Route::get('/product/{id}', 'Product\ProductController@getProduct')->name('get.user.get_product_detail');
Route::get('/add-to-cart/{id}', 'Product\ProductController@getAddToCart')->name('get.product.add_to_cart');
Route::get('/shopping-cart', 'Product\ProductController@getCart')->name('get.product.get_shopping_cart');
Route::get('/remove-to-cart/{id}', 'Product\ProductController@removeToCart')->name('get.product.remove_to_cart');
Route::get('/remove-one-to-cart/{id}', 'Product\ProductController@removeOneToCart')->name('get.product.remove_on_to_cart');

Route::get('/cart', 'Cart\CartController@index')->name('get.cart.get_cart');

Route::get('/user-info', 'Auth\UserController@index');

Route::get('/register', 'Auth\RegisterController@register')->name('get.user.register');
Route::post('/register', 'Auth\RegisterController@postRegister')->name('post.user.register');

Route::get('/login', 'Auth\LoginController@login')->name('get.user.login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('post.user.login');

Route::get('login/google', 'Auth\LoginController@loginGoogle')->name('get.user.login_google');
Route::get('login/google/callback', 'Auth\LoginController@loginGoogleCallback');

Route::get('login/facebook', 'Auth\LoginController@loginFacebook')->name('get.user.login_facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@loginFacebookCallback');

Route::get('/logout', 'Auth\LoginController@logout')->name('get.user.logout');

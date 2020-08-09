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

Route::prefix('admin')->group(function()
{
    Route::get('/login', 'AdminAuthController@index')->name('get.admin.login');

    Route::post('/login', 'AdminAuthController@postLogin')->name('admin_login');

    Route::group(['middleware'=> 'auth.jwt'], function ()
    {
        Route::group(['prefix'=> 'dashboard'], function ()
        {
            Route::get('/', 'DashboardController@index')->name('get.dashboard.index');
        });

        Route::group(['prefix'=> 'module-group'], function ()
        {
            Route::get('/', 'ModuleGroupController@index')->name('get.module_group.index');
            Route::get('/{id}', 'ModuleGroupController@getModuleGroup')->name('get.module_group.get_module_group');
            Route::put('/{id}', 'ModuleGroupController@editModuleGroup')->name('put.module_group.edit');
            Route::post('/add', 'ModuleGroupController@store')->name('post.module_group.add');
        });

        Route::group(['prefix'=> 'permissions'], function ()
        {
            Route::get('/', 'PermissionController@index')->name('get.permissions.index');
            Route::post('/add', 'PermissionController@store')->name('get.permissions.add');
            Route::get('/{id}', 'PermissionController@getPermission')->name('get.permissions.get_permission');
            Route::put('/{id}', 'PermissionController@editPermission')->name('get.permissions.edit');
        });

        Route::group(['prefix'=> 'modules'], function ()
        {
            Route::get('/', 'ModuleController@index')->name('get.modules.index');
            Route::post('/add', 'ModuleController@store')->name('get.modules.add');
            Route::get('/{id}', 'ModuleController@getModule')->name('get.modules.get_module');
            Route::put('/{id}', 'ModuleController@editModule')->name('get.modules.edit');
        });

        Route::group(['prefix'=> 'roles'], function ()
        {
            Route::get('/', 'RoleController@index')->name('get.roles.index');
            Route::post('/add', 'RoleController@store')->name('get.roles.add');
            Route::get('/{id}', 'RoleController@getRole')->name('get.roles.get_role');
            Route::put('/{id}', 'RoleController@editRole')->name('get.roles.edit');
        });

        Route::group(['prefix'=> 'producers'], function ()
        {
            Route::get('/', 'ProducerController@index')->name('get.producers.index');
            Route::post('/add', 'ProducerController@store')->name('get.producers.add');
            Route::get('/{id}', 'ProducerController@getProducer')->name('get.producers.get_producer');
            Route::post('/{id}', 'ProducerController@editProducer')->name('get.producers.edit');
        });


        Route::group(['prefix'=> 'brands'], function ()
        {
            Route::get('/', 'BrandController@index')->name('get.brands.index');
            Route::post('/add', 'BrandController@store')->name('get.brands.add');
            Route::get('/{id}', 'BrandController@getBrand')->name('get.brands.get_brand');
            Route::post('/{id}', 'BrandController@editBrand')->name('get.brands.edit');
        });

        Route::group(['prefix'=> 'category'], function ()
        {
            Route::get('/', 'CategoryController@index')->name('get.category.index');
            Route::post('/add', 'CategoryController@store')->name('get.category.add');
            Route::get('/{id}', 'CategoryController@getCategory')->name('get.category.get_category');
            Route::post('/{id}', 'CategoryController@editCategory')->name('get.category.edit');
        });

        Route::group(['prefix'=> 'products'], function ()
        {
            Route::get('/', 'ProductController@index')->name('get.products.index');
            Route::post('/add', 'ProductController@store')->name('get.products.add');
            Route::get('/{id}', 'ProductController@getProduct')->name('get.products.get_product');
            Route::post('/{id}', 'ProductController@editProduct')->name('get.products.edit');
        });

        Route::group(['prefix'=> 'bills'], function ()
        {
            Route::get('/', 'BillController@index')->name('get.bills.index');
            Route::post('/add', 'BillController@store')->name('get.bills.add');
            Route::get('/{id}', 'BillController@getBill')->name('get.bills.get_bill');
            Route::post('/{id}', 'BillController@editBill')->name('get.bills.edit');
            Route::post('/update-status/{id}', 'BillController@updateBillStatus')->name('get.bills.update_status');
            Route::get('/detail/{id}', 'BillController@getBillDetail')->name('get.bills.get_bill_detail');
        });

        Route::group(['prefix'=> 'bill-detail'], function ()
        {
            Route::get('/', 'BillDetailController@index')->name('get.bill_detail.index');
            Route::post('/add', 'BillDetailController@store')->name('get.bill_detail.add');
            Route::get('/{id}', 'BillDetailController@getBillDetail')->name('get.bill_detail.get_bill_detail');
            Route::post('/{id}', 'BillDetailController@editBillDetail')->name('get.bill_detail.edit');
            Route::post('/update/detail', 'BillDetailController@updateBillDetail')->name('get.bill_detail.update_bill_detail');
            Route::post('/remove/product/detail', 'BillDetailController@removeProductBill')->name('get.bill_detail.remove_product_bill');
        });

        Route::group(['prefix'=> 'acc-admins'], function ()
        {
            Route::get('/', 'AdminController@index')->name('get.acc_admins.index');
            Route::post('/add', 'AdminController@store')->name('get.acc_admins.add');
            Route::get('/{id}', 'AdminController@getAccAdmin')->name('get.acc_admins.get_user');
            Route::post('/{id}', 'AdminController@editAccAdmin')->name('get.acc_admins.edit');
            Route::get('/avatar/{id}', 'AdminController@getAvatarAdmin')->name('get.acc_admins.get_avatar_user');
            Route::post('/avatar/{id}', 'AdminController@updateAvatarAdmin')->name('get.acc_admins.update_avatar_user');
        });

        Route::group(['prefix'=> 'acc-user'], function ()
        {
            Route::get('/', 'UserController@index')->name('get.users.index');
            Route::post('/add', 'UserController@store')->name('get.users.add');
            Route::get('/{id}', 'UserController@getAccUser')->name('get.users.get_user');
            Route::post('/{id}', 'UserController@editAccUser')->name('get.users.edit');
            Route::get('/avatar/{id}', 'UserController@getAvatarUser')->name('get.users.get_avatar_user');
            Route::post('/avatar/{id}', 'UserController@updateAvatarUser')->name('get.users.update_avatar_user');
        });

        Route::get('/register', 'AdminController@create')->name('get.admin.register');

        Route::post('/register', 'AdminController@store')->name('post.admin.register');

        Route::get('/logout', 'AdminAuthController@logout')->name('post.admin.logout');
    });

});

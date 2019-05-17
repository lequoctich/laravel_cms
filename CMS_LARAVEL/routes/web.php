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
Route::group([
    'as' => 'guest.',
    'namespace' => 'Guest\Ecommerge'
], function () {
    Route::get('/', 'HomeController@index');
});

Route::group([
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::get('/admins', 'HomeController@index');
    Route::get('/admins/menus', 'MenuController\MenuController@index');
    Route::post('/admins/menus/ajax/sort_menu', 'MenuController\MenuAjaxController@sortMenu');
    Route::put('/admins/menus/ajax/edit_menu', 'MenuController\MenuAjaxController@editMenu');
    Route::post('/admins/menus/ajax/add_menu', 'MenuController\MenuAjaxController@addMenu');
    Route::delete('/admins/menus/ajax/delete_menu', 'MenuController\MenuAjaxController@deleteMenu');

    Route::get('/admins/menus/edits/{idMenu}', 'MenuController\MenuController@edits');

    Route::get('/admins/category', 'CategoryController\CategoryController@list');
    Route::post('/admins/category/rename', 'CategoryController\CategoryController@rename');
    Route::post('/admins/category/add_child', 'CategoryController\CategoryController@addChild');
    Route::post('/admins/category/remove_child', 'CategoryController\CategoryController@removeChild');
    Route::delete('/admins/category/delete', 'CategoryController\CategoryController@delete');
    Route::post('/admins/category/add_category', 'CategoryController\CategoryController@addCategory');

    Route::get('/admins/page', 'PageController\PageController@list');
    Route::post('/admins/page/rename', 'PageController\PageController@rename');
    Route::post('/admins/page/add_child', 'PageController\PageController@addChild');
    Route::post('/admins/page/remove_child', 'PageController\PageController@removeChild');
    Route::delete('/admins/page/delete', 'PageController\PageController@delete');
    Route::post('/admins/page/add_page', 'PageController\PageController@addPage');

});


Route::get(
    '/gioi-thieu',
    function () {
        return view('introduce/index');
    }
);

Route::get(
    '/thanh-toan',
    function () {
        return view('pay_ment/index');
    }
);

Route::get(
    '/lien-he',
    function () {
        return view('contact/index');
    }
);

Route::get(
    '/danh-muc/sofa-ni',
    function () {
        return view('product/list_product/index');
    }
);

Route::get(
    '/danh-muc/sofa-da',
    function () {
        return view('product/list_product/index');
    }
);

Route::get(
    '/danh-muc/ban-sofa',
    function () {
        return view('product/list_product/index');
    }
);

Route::get(
    '/san-pham/detail',
    function () {
        return view('product/detail_product/index');
    }
);

Route::get(
    '/category/tin-tuc',
    function () {
        return view('category/list_category/index');
    }
);

Auth::routes();

//Route::get('/home', 'Admin\HomeController@index')->name('home');

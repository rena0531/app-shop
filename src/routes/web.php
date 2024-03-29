<?php
/*
|--------------------------------------------------------------------------
| 1) User ログイン後
|--------------------------------------------------------------------------
*/
//店舗登録機能は実装しない
Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function() {
//店舗管理画面表示
    Route::get('/home', 'HomeController@index')->name('home');
//店舗一覧商品画面表示
    Route::get('/home/index', 'HomeController@show')->name('home.show');
//商品登録画面表示
    Route::get('/products/create', 'ProductController@create')->name('products.create');
//商品登録
    Route::post('/products', 'ProductController@store')->name('products.store');
//商品編集画面表示
    Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');
//商品編集
    Route::put('/products/{product}', 'ProductController@update')->name('products.update');
//商品削除
    Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');
});


/*
|--------------------------------------------------------------------------
| 2) User 認証不要
|--------------------------------------------------------------------------
*/
//商品一覧表示画面
    Route::get('/products', 'ProductController@index')->name('products.index');
//商品詳細表示画面
    Route::get('/products/{product}', 'ProductController@show')->name('products.show');
//店舗一覧表示画面
    Route::get('/shops', 'UserController@list')->name('users.list');
    //店舗商品表示画面
    Route::get('/shops/{user}', 'UserController@index')->name('users.index');


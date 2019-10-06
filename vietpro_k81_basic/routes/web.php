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
//=============COMPOSER==================
View::composer(['*'], function($view) {
    $testview = App\Model\Product::all();
    $view->with('testview', $testview);
});

//==============> FONT - END <=================
//==============> Group Route Cart <=================
Route::group(['prefix' => 'cart'], function () {
    Route::get('cart','Fontend\CartController@getCart');
});

//==============> Group Route Checkout <=================
Route::group(['prefix' => 'checkout'], function () {
    Route::get('checkout','Fontend\CheckoutController@getCheckout');
    Route::post('checkout','Fontend\CheckoutController@postCheckout');

    Route::get('complete','Fontend\CheckoutController@getComplete');
});

//==============> Group Route Product <=================
Route::group(['prefix' => 'product'], function () {
    Route::get('detail','Fontend\ProductController@getDetail');
    Route::get('shop','Fontend\ProductController@getShop');
});

//==============> Group Route Home <=================
Route::group(['prefix' => 'home'], function () {
    Route::get('about','Fontend\HomeController@getAbout');
    Route::get('contact','Fontend\HomeController@getContact');
});
Route::get('','Fontend\HomeController@getIndex');



//==============> BACK - END <=================

Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function () {
    Route::get('login','Backend\LoginController@getLogin' );
    Route::get('logout','Backend\LoginController@getLogout' );

    Route::get('', 'Backend\IndexController@getIndex');
    
    //==============> Category <=================
    Route::group(['prefix' => 'category'], function () {

        Route::get('', 'Backend\CategoryController@getCategory');
        Route::post('', 'Backend\CategoryController@postCategory');

        Route::get('edit', 'Backend\CategoryController@getEditCategory');
    });
    //==============> Oder <=================
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'Backend\OrderController@getOrder');
        Route::get('detail', 'Backend\OrderController@getDetailOrder');
        Route::get('processed', 'Backend\OrderController@getProcessed');
    });
    //==============> Product <=================
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'Backend\ProductController@getListProduct');

        Route::get('add', 'Backend\ProductController@getAddProduct');
        Route::post('add', 'Backend\ProductController@postAddProduct');

        Route::get('edit', 'Backend\ProductController@getEditProduct');
    });
    //==============> User <=================
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'Backend\UserController@getListUser');

        Route::get('add', 'Backend\UserController@getAddUser');
        Route::post('add', 'Backend\UserController@postAddUser');

        Route::get('edit', 'Backend\UserController@getEditUser');
    });
});








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

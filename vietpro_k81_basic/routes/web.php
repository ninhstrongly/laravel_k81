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
//=============QUERY BUIDER==================
Route::group(['prefix' => 'query'], function () {
    Route::get('get', function () {
        $user = DB::table('users')->get();
        dd($user[0]);
    });
    Route::get('first', function () {
        $user = DB::table('users')->skip(1)->take(3)->get();
        dd($user);
    });
    Route::get('where', function () {
        $user = DB::table('users')->where('id','>',1)->where('id','<',5)->orderBy('id','desc')->get();
        dd($user);
    });

});

//=============COMPOSER==================
View::composer(['*'], function($view) {
    $testview = App\Model\Product::all();
    $view->with('testview', $testview);
});

//============RELATIONSHIP==============
Route::group(['prefix' => 'relationship'], function () {
    //===========> 1 VS 1(T) <============
    Route::get('one-one',function(){
        return view('relationship');
    });
    //===========> 1 VS 1(N) <============
    Route::get('one-one-n', function () {
        $info = App\Model\Info::all();
        return view('relationship',compact('info'));
    });
    //===========> 1 VS N <===============
    Route::get('one-many', function () {
        return view('relationship');
    });
    //===========> N VS N <===============
    Route::get('many-many', function () {
        return view('relationship');
    });
});

//==============> FONT - END <=================
//==============> Group Route Cart <=================
Route::group(['prefix' => 'cart'], function () {

    Route::get('','Fontend\CartController@getCart');

    Route::get('add','Fontend\CartController@AddCart');

    Route::get('update/{rowId}/{qty}','Fontend\CartController@UpdateCart');
    Route::get('del/{rowId}','Fontend\CartController@DelCart');
});

//==============> Group Route Checkout <=================
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','Fontend\CheckoutController@getCheckout');
    Route::post('','Fontend\CheckoutController@postCheckout');

    Route::get('complete/{order_id}','Fontend\CheckoutController@getComplete');
});

//==============> Group Route Product <=================
Route::group(['prefix' => 'product'], function () {
    Route::get('shop','Fontend\ProductController@getShop');
    Route::get('{slug_prd}.html','Fontend\ProductController@getDetail');
});

//==============> Group Route Home <=================
Route::group(['prefix' => 'home'], function () {
    Route::get('about','Fontend\HomeController@getAbout');
    Route::get('contact','Fontend\HomeController@getContact');
    Route::get('reference','Fontend\HomeController@getReference');
    Route::post('reference','Fontend\HomeController@postReference');
});
Route::get('','Fontend\HomeController@getIndex');
Route::get('{slug}.html','Fontend\HomeController@getPrdCate');
Route::get('finter','Fontend\HomeController@getFinter');
Route::get('search','Fontend\HomeController@getSearch')->name('search');

//==============> LARAVEL IMPRORT EXCEL <=================
Route::get('export', 'Backend\ProductController@export');
Route::post('import','Backend\ProductController@import');


//==============> BACK - END <=================
    
Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function () {

    Route::get('login','Backend\LoginController@getLogin' );
    Route::get('logout','Backend\IndexController@getLogout' );
    
    Route::get('', 'Backend\IndexController@getIndex');
    
    //==============> Category <=================
    Route::group(['prefix' => 'category'], function () {

        Route::get('', 'Backend\CategoryController@getCategory');
        Route::post('', 'Backend\CategoryController@postCategory');

        Route::get('edit/{id}', 'Backend\CategoryController@getEditCategory');
        Route::post('edit/{id}', 'Backend\CategoryController@postEditCategory');

        Route::get('del/{id}','Backend\CategoryController@delCategory');
    });
    //==============> Oder <=================
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'Backend\OrderController@getOrder');
        
        Route::get('processed', 'Backend\OrderController@getProcessed');
        Route::get('detail/{id}', 'Backend\OrderController@getDetailOrder');

        Route::get('paid/{id}', 'Backend\OrderController@paid');

    });
    //==============> Product <=================
    Route::group(['prefix' => 'product'], function () {
        Route::get('/',[
            'as'=>'user.index',
            'uses'=>'Backend\ProductController@getListProduct',
            'middleware'=>'checkMiddleware:prd-list',
        ]);
            
        Route::get('add',[
            'as'=>'user.index',
            'uses'=>'Backend\ProductController@getAddProduct',
            'middleware'=>'checkMiddleware:prd-add',
        ]);
        
        Route::post('add',[
            'as'=>'user.index',
            'uses'=>'Backend\ProductController@postAddProduct',
            'middleware'=>'checkMiddleware:prd-add',
        ]);

        Route::get('edit/{id}',[
            'as'=>'user.index',
            'uses'=>'Backend\ProductController@getEditProduct',
            'middleware'=>'checkMiddleware:prd-edit',
        ]);

        Route::post('edit/{id}',[
            'as'=>'user.index',
            'uses'=>'Backend\ProductController@postEditProduct',
            'middleware'=>'checkMiddleware:prd-edit',
        ]);

        Route::get('del/{id}',[
            'as'=>'user.index',
            'uses'=>'Backend\ProductController@delEditProduct',
            'middleware'=>'checkMiddleware:prd-del',
        ]);  
        
    });
    //==============> User <=================
    Route::group(['prefix' => 'user'], function () {
        Route::get('/',[
            'as'=>'user.index',
            'uses'=>'Backend\UserController@getListUser',
            'middleware'=>'checkMiddleware:user-list',
        ]);
        Route::get('/', 'Backend\UserController@getListUser')->name('user.index');
        Route::get('add', 'Backend\UserController@getAddUser');
        Route::post('add', 'Backend\UserController@postAddUser');

        Route::get('edit/{id}', 'Backend\UserController@getEditUser');
        Route::post('edit/{id}', 'Backend\UserController@postEditUser');

        Route::get('del/{id}','Backend\UserController@delUser');
    });
});

Route::get('ninh', function () {
    $content = 1;
    $type =2;
    return response($content)
            ->withHeaders([
                'Content-Type' => $type,
                'X-Header-One' => 'Header Value',
                'X-Header-Two' => 'Header Value',
            ]);
});

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin/role')->group(function(){
        Route::get('/',[
            'as'=>'role.index',
            'uses'=>'Backend\RoleController@index',
            //'middleware'=>'checkMiddleware:role-list',
        ]);
        
        Route::get('/create','Backend\RoleController@getCreate')->name('role.add');
        Route::post('/create','Backend\RoleController@postCreate')->name('role.store');

        Route::get('/edit/{id}','Backend\RoleController@getEdit')->name('role.edit');
        Route::post('/edit/{id}','Backend\RoleController@postEdit')->name('role.edit');

        Route::get('/del/{id}','Backend\RoleController@delete')->name('role.del');
    });
});

Auth::routes();


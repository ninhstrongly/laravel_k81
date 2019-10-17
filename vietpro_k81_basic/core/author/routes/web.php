<?php

Route::group(['namespace' => 'Unicorn\Author\Http\Controllers'], function () {
    Route::get('/demo', 'AuthorController@getIndex');
});
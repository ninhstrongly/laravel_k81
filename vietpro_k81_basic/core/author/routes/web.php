<?php

Route::group(['namespace' => 'Unicorn\Author\Http\Controllers'], function () {
    
    Route::get('/diem', 'AuthorController@getIndex')->middleware('CheckAge');
});
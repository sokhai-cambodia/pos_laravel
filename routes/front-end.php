<?php

Route::group(['prefix' => 'front-end', 'middleware' => ['auth']], function(){

    Route::get('pos','FrontEndController@index')->name('front-end.pos');
    Route::post('pos','FrontEndController@store')->name('front-end.store');
    Route::get('room', 'FrontEndController@room')->name('front-end.room');

    // AJAX ROUTE
    Route::get('get-product-list', 'FrontEndController@getProductList')->name('front-end.get-product-list');
    Route::get('get-product', 'FrontEndController@getProduct')->name('front-end.get-product');

    Route::get('get-list-category', 'OrderController@filterListCategory')->name('search-list-category');

});


Route::get('/pos/login', 'POSLoginController@index')->name('pos.login');
Route::post('/pos/login', 'POSLoginController@login')->name('pos.login');
Route::get('/pos/logout', 'POSLoginController@logout')->name('pos.logout');

// CHOOSE BRANCH
Route::get('/pos/choose-branch', 'FrontEndController@chooseBranch')->name('pos.login');
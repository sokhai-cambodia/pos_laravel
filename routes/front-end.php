<?php

Route::group(['prefix' => 'pos', 'middleware' => ['auth']], function(){

    Route::get('','FrontEndController@index')->name('pos.pos');
    Route::post('','FrontEndController@store')->name('pos.store');
    Route::get('/room', 'FrontEndController@room')->name('pos.room');

    // AJAX ROUTE
    Route::get('get-product-list', 'FrontEndController@getProductList')->name('pos.get-product-list');
    Route::get('get-product', 'FrontEndController@getProduct')->name('pos.get-product');

    // Route::get('get-list-category', 'OrderController@filterListCategory')->name('search-list-category');

});


Route::get('/pos/login', 'POSLoginController@index')->name('pos.login');
Route::post('/pos/login', 'POSLoginController@login')->name('pos.login');
Route::get('/pos/logout', 'POSLoginController@logout')->name('pos.logout');

// CHOOSE BRANCH
Route::get('/pos/show-branch', 'FrontEndController@showBranch')->name('pos.show-branch');
Route::get('/pos/choose-branch/{id}', 'FrontEndController@chooseBranch')->name('pos.choose-branch');
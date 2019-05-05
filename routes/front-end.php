<?php 

Route::group(['prefix' => 'front-end'], function(){

    Route::get('pos','FrontEndController@index')->name('front-end.pos');
    Route::get('room', 'FrontEndController@room')->name('front-end.room');

    // AJAX ROUTE
    Route::get('get-product', 'FrontEndController@getProduct')->name('front-end.get-product');

});
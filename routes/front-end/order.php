<?php

Route::group(['prefix' => 'order'], function(){

    Route::get('', 'FrontEnd\OrderController@room')->name('order');
    Route::get('/product', 'FrontEnd\OrderController@index')->name('order');

});

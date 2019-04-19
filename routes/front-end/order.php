<?php

Route::group(['prefix' => 'order'], function(){

    Route::get('', 'FrontEnd\OrderController@index')->name('order');

});

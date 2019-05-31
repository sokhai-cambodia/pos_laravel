<?php

Route::group(['prefix' => 'payment'], function(){
    Route::get('', 'Cms\PaymentController@index')->name('payment.create');
    Route::post('', 'Cms\PaymentController@store')->name('payment.create');
   
});

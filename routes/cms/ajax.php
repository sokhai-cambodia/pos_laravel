<?php

Route::group(['prefix' => 'ajax'], function(){
    Route::post('/find-permission', 'Cms\AjaxController@findPermission')->name('ajax.find-permission');
    Route::post('/find-product-ingredient', 'Cms\AjaxController@findProductIngredient')->name('ajax.find-product-ingredient');
    Route::post('/find-update-product-ingredient', 'Cms\AjaxController@findUpdateProductIngredient')->name('ajax.find-update-product-ingredient');
    Route::get('/find-product-ingredient', 'Cms\AjaxController@findProductIngredient')->name('ajax.find-product-ingredient');
    Route::post('/find-user-info', 'Cms\AjaxController@findUserInfo')->name('ajax.find-user-info');
});
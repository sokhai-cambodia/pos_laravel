<?php

Route::group(['prefix' => 'ajax'], function(){
//     Route::post('/find-permission', 'Cms\AjaxController@findPermission')->name('ajax.find-permission');
//     Route::post('/find-update-product-ingredient', 'Cms\AjaxController@findUpdateProductIngredient')->name('ajax.find-update-product-ingredient');
    Route::post('/find-user-info', 'Cms\AjaxController@findUserInfo')->name('ajax.find-user-info');
    Route::get('/find-product-ingredient', 'Cms\AjaxController@findProductIngredient')->name('ajax.find-product-ingredient');
    Route::get('/find-product-ingredient-by-id', 'Cms\AjaxController@findProductIngredientById')->name('ajax.find-product-ingredient-by-id');
    Route::get('/find-update-product-ingredient-by-id', 'Cms\AjaxController@findUpdateProductIngredientById')->name('ajax.find-update-product-ingredient-by-id');
});
<?php

Route::group(['prefix' => 'product'], function(){

    Route::get('', 'Cms\ProductController@index')->name('product');
    Route::get('/lists', 'Cms\ProductController@getProductLists')->name('product.lists');
    Route::get('/create', 'Cms\ProductController@create')->name('product.create');
    Route::post('/store', 'Cms\ProductController@store')->name('product.store');
    Route::get('/edit/{id}', 'Cms\ProductController@edit')->name('product.edit');
    Route::post('/update/{id}', 'Cms\ProductController@update')->name('product.update');
    Route::get('/destroy/{id}', 'Cms\ProductController@destroy')->name('product.delete');

});

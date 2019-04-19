<?php

Route::group(['prefix' => 'product'], function(){
    Route::get('', 'Cms\ProductController@index')->name('product');
    Route::get('/lists', 'Cms\ProductController@getProductLists')->name('product.lists');
    Route::get('/create', 'Cms\ProductController@create')->name('product.create');
    Route::post('/create', 'Cms\ProductController@store')->name('product.create');
    Route::get('/update/{id}', 'Cms\ProductController@edit')->name('product.update');
    Route::post('/update/{id}', 'Cms\ProductController@update')->name('product.update');
    Route::get('/delete/{id}', 'Cms\ProductController@destroy')->name('product.delete');
});

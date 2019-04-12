<?php

Route::group(['prefix' => 'product'], function(){
    Route::get('', [
        'uses' => 'Cms\ProductController@index',
        'as' => 'product'
    ]);
    
    Route::get('/create', [
        'uses' => 'Cms\ProductController@create',
        'as' => 'product.create'
    ]);
    
    Route::post('/store', [
        'uses' => 'Cms\ProductController@store',
        'as' => 'product.create'
    ]);
    
    Route::post('/update/{id}', [
        'uses' => 'Cms\ProductController@update',
        'as' => 'product.update'
    ]);
    
    Route::get('/edit/{id}', [
        'uses' => 'Cms\ProductController@edit',
        'as' => 'product.update'
    ]);
    
    Route::get('/destroy/{id}', [
        'uses' => 'Cms\ProductController@destroy',
        'as' => 'product.destroy'
    ]);
    
});

<?php

Route::group(['prefix' => 'category'], function(){
    Route::get('', [
        'uses' => 'Cms\CategoryController@index',
        'as' => 'category'
    ]);
    
    Route::get('/create', [
        'uses' => 'Cms\CategoryController@create',
        'as' => 'category.create'
    ]);
    
    Route::post('/store', [
        'uses' => 'Cms\CategoryController@store',
        'as' => 'category.create'
    ]);
    
    Route::post('/update/{id}', [
        'uses' => 'Cms\CategoryController@update',
        'as' => 'category.update'
    ]);
    
    Route::get('/edit/{id}', [
        'uses' => 'Cms\CategoryController@edit',
        'as' => 'category.update'
    ]);
    
    Route::get('/destroy/{id}', [
        'uses' => 'Cms\CategoryController@destroy',
        'as' => 'category.destroy'
    ]);
    
});


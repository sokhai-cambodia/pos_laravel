<?php

Route::group(['prefix' => 'category'], function(){

    Route::post('/store', 'Cms\CategoryController@store')->name('category.create');
    Route::post('/update/{id}', 'Cms\CategoryController@update')->name('category.update');
    Route::get('', 'Cms\CategoryController@index')->name('category');
    Route::get('/create', 'Cms\CategoryController@create')->name('category.create');
    Route::get('/edit/{id}', 'Cms\CategoryController@edit')->name('category.update');
    Route::get('/destroy/{id}', 'Cms\CategoryController@destroy')->name('category.destroy');

});


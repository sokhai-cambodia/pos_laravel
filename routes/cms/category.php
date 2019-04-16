<?php

Route::group(['prefix' => 'category'], function(){

    Route::get('', 'Cms\CategoryController@index')->name('category');
    Route::get('/lists', 'Cms\CategoryController@getCategoryLists')->name('category.lists');
    Route::get('/create', 'Cms\CategoryController@create')->name('category.create');
    Route::post('/store', 'Cms\CategoryController@store')->name('category.store');
    Route::get('/edit/{id}', 'Cms\CategoryController@edit')->name('category.edit');
    Route::post('/update/{id}', 'Cms\CategoryController@update')->name('category.update');
    Route::get('/destroy/{id}', 'Cms\CategoryController@destroy')->name('category.delete');

});


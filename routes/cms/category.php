<?php

Route::group(['prefix' => 'category'], function(){

    Route::get('', 'Cms\CategoryController@index')->name('category');
    Route::get('/lists', 'Cms\CategoryController@getCategoryLists')->name('category.lists');
    Route::get('/create', 'Cms\CategoryController@create')->name('category.create');
    Route::post('/create', 'Cms\CategoryController@store')->name('category.create');
    Route::get('/update/{id}', 'Cms\CategoryController@edit')->name('category.update');
    Route::post('/update/{id}', 'Cms\CategoryController@update')->name('category.update');
    Route::get('/destroy/{id}', 'Cms\CategoryController@destroy')->name('category.delete');

});


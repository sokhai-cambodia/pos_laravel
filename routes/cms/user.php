<?php

Route::group(['prefix' => 'user'], function(){

    Route::get('', 'Cms\UserController@index')->name('user');
    Route::get('/lists', 'Cms\UserController@getUserLists')->name('user.lists');
    Route::get('/create', 'Cms\UserController@create')->name('user.create');
    Route::post('/store', 'Cms\UserController@store')->name('user.store');
    Route::get('/edit/{id}', 'Cms\UserController@edit')->name('user.edit');
    Route::post('/update/{id}', 'Cms\UserController@update')->name('user.update');
    Route::get('/destroy/{id}', 'Cms\UserController@destroy')->name('user.delete');

});


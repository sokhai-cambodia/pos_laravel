<?php

Route::group(['prefix' => 'user'], function(){
    Route::get('', [
        'uses' => 'Cms\UsersController@index',
        'as' => 'user'
    ]);

    Route::get('/create', [
        'uses' => 'Cms\UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/store', [
        'uses' => 'Cms\UsersController@store',
        'as' => 'user.create'
    ]);

    Route::post('/update/{id}', [
        'uses' => 'Cms\UsersController@update',
        'as' => 'user.update'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'Cms\UsersController@edit',
        'as' => 'user.update'
    ]);

    Route::get('/destroy/{id}', [
        'uses' => 'Cms\UsersController@destroy',
        'as' => 'user.destroy'
    ]);

});


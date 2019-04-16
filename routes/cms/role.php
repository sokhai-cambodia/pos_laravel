<?php

Route::group(['prefix' => 'role'], function(){

    Route::get('', 'Cms\RoleController@index')->name('role');
    Route::get('/lists', 'Cms\RoleController@getRoleLists')->name('role.lists');
    Route::get('/create', 'Cms\RoleController@create')->name('role.create');
    Route::post('/store', 'Cms\RoleController@store')->name('role.store');
    Route::get('/edit/{id}', 'Cms\RoleController@edit')->name('role.edit');
    Route::post('/update/{id}', 'Cms\RoleController@update')->name('role.update');
    Route::get('/destroy/{id}', 'Cms\RoleController@destroy')->name('role.delete');

});


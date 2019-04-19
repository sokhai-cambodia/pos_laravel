<?php

Route::group(['prefix' => 'permission'], function(){

    Route::get('', 'Cms\PermissionController@index')->name('permission');
    Route::get('/lists', 'Cms\PermissionController@getPermissionLists')->name('permission.lists');
    Route::get('/create', 'Cms\PermissionController@create')->name('permission.create');
    Route::post('/create', 'Cms\PermissionController@store')->name('permission.create');
    Route::get('/update/{id}', 'Cms\PermissionController@edit')->name('permission.update');
    Route::post('/update/{id}', 'Cms\PermissionController@update')->name('permission.update');
    Route::get('/destroy/{id}', 'Cms\PermissionController@destroy')->name('permission.delete');
    Route::get('/list-sub-permission', 'Cms\PermissionController@show')->name('permission.list-sub-permission');

});
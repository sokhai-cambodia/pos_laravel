<?php

Route::group(['prefix' => 'permission'], function(){
    Route::get('/create', 'Cms\PermissionController@create')->name('permission.create');
    Route::post('/create', 'Cms\PermissionController@store')->name('permission.create');
    Route::get('', 'Cms\PermissionController@index')->name('permission');
    Route::get('/lists', 'Cms\PermissionController@getPermissionLists')->name('permission.lists');
});
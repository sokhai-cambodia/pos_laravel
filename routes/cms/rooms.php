<?php

Route::group(['prefix' => 'room'], function(){

    Route::get('', 'Cms\RoomController@index')->name('room');
    Route::get('/lists', 'Cms\RoomController@getUnitLists')->name('room.lists');
    Route::get('/create', 'Cms\RoomController@create')->name('room.create');
    Route::post('/store', 'Cms\RoomController@store')->name('room.store');
    Route::get('/edit/{id}', 'Cms\RoomController@edit')->name('room.edit');
    Route::post('/update/{id}', 'Cms\RoomController@update')->name('room.update');
    Route::get('/destroy/{id}', 'Cms\RoomController@destroy')->name('room.delete');

});


<?php

Route::group(['prefix' => 'room'], function(){

    Route::get('', 'Cms\RoomController@index')->name('room');
    Route::get('/lists', 'Cms\RoomController@getRoomLists')->name('room.lists');
    Route::get('/create', 'Cms\RoomController@create')->name('room.create');
    Route::post('/create', 'Cms\RoomController@store')->name('room.create');
    Route::get('/update/{id}', 'Cms\RoomController@edit')->name('room.update');
    Route::post('/update/{id}', 'Cms\RoomController@update')->name('room.update');
    Route::get('/destroy/{id}', 'Cms\RoomController@destroy')->name('room.delete');

});


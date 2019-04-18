<?php

Route::group(['prefix' => 'unit'], function(){

    Route::get('', 'Cms\UnitController@index')->name('unit');
    Route::get('/lists', 'Cms\UnitController@getUnitLists')->name('unit.lists');
    Route::get('/create', 'Cms\UnitController@create')->name('unit.create');
    Route::post('/create', 'Cms\UnitController@store')->name('unit.create');
    Route::get('/update/{id}', 'Cms\UnitController@edit')->name('unit.update');
    Route::post('/update/{id}', 'Cms\UnitController@update')->name('unit.update');
    Route::get('/destroy/{id}', 'Cms\UnitController@destroy')->name('unit.delete');

});


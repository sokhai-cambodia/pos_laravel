<?php

Route::group(['prefix' => 'unit'], function(){
    Route::get('', [
        'uses' => 'Cms\UnitController@index',
        'as' => 'unit'
    ]);
    
    Route::get('/create', [
        'uses' => 'Cms\UnitController@create',
        'as' => 'unit.create'
    ]);
    
    Route::post('/store', [
        'uses' => 'Cms\UnitController@store',
        'as' => 'unit.create'
    ]);
    
    Route::post('/update/{id}', [
        'uses' => 'Cms\UnitController@update',
        'as' => 'unit.update'
    ]);
    
    Route::get('/edit/{id}', [
        'uses' => 'Cms\UnitController@edit',
        'as' => 'unit.update'
    ]);
    
    Route::get('/destroy/{id}', [
        'uses' => 'Cms\UnitController@destroy',
        'as' => 'unit.destroy'
    ]);
    
});

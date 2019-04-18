<?php

Route::group(['prefix' => 'branch'], function(){

    Route::get('', 'Cms\BranchController@index')->name('branch');
    Route::get('/lists', 'Cms\BranchController@getBranchLists')->name('branch.lists');
    Route::get('/create', 'Cms\BranchController@create')->name('branch.create');
    Route::post('/create', 'Cms\BranchController@store')->name('branch.create');
    Route::get('/update/{id}', 'Cms\BranchController@edit')->name('branch.update');
    Route::post('/update/{id}', 'Cms\BranchController@update')->name('branch.update');
    Route::get('/destroy/{id}', 'Cms\BranchController@destroy')->name('branch.delete');
    
});


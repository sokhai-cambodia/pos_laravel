<?php

Route::group(['prefix' => 'branch'], function(){

    Route::get('', 'Cms\BranchController@index')->name('branch');
    Route::get('/lists', 'Cms\BranchController@getBranchLists')->name('branch.lists');
    Route::get('/create', 'Cms\BranchController@create')->name('branch.create');
    Route::post('/store', 'Cms\BranchController@store')->name('branch.store');
    Route::get('/edit/{id}', 'Cms\BranchController@edit')->name('branch.edit');
    Route::post('/update/{id}', 'Cms\BranchController@update')->name('branch.update');
    Route::get('/destroy/{id}', 'Cms\BranchController@destroy')->name('branch.delete');

});


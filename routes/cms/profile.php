<?php

Route::group(['prefix' => 'profile'], function(){
    Route::get('/edit', 'Cms\ProfileController@edit')->name('profile.edit');
    Route::post('/update', 'Cms\ProfileController@update')->name('profile.update');
    Route::get('/change-password', 'Cms\ProfileController@changePassword')->name('profile.change-password');
    Route::post('/update-password', 'Cms\ProfileController@updatePassword')->name('profile.update-password');

});


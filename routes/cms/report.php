<?php

Route::group(['prefix' => 'report'], function(){
    // Route::get('/update', 'Cms\ProfileController@edit')->name('profile.update');
    Route::get('/daily', 'Cms\ReportsController@daily')->name('report.daily');
    Route::get('/month', 'Cms\ReportsController@month')->name('report.month');
    Route::get('/year', 'Cms\ReportsController@year')->name('report.year');
    Route::get('/stock', 'Cms\ReportsController@stock')->name('report.stock');


});

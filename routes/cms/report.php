<?php

Route::group(['prefix' => 'report'], function(){
    // Route::get('/update', 'Cms\ProfileController@edit')->name('profile.update');
    Route::get('/daily', 'Cms\ReportsController@daily')->name('report.daily');
    Route::get('/month', 'Cms\ReportsController@month')->name('report.month');
    Route::get('/year', 'Cms\ReportsController@year')->name('report.year');
    Route::get('/stock', 'Cms\ReportsController@stock')->name('report.stock');
    Route::get('/transfer-stock', 'Cms\ReportsController@transferStock')->name('report.transfer-stock');

    // ################## AJAX ROUTE ##################
    Route::get('/invoice-detail', 'Cms\ReportsController@getInvoiceDetail')->name('report.invoice-detail');
});

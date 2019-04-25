<?php

Route::group(['prefix' => 'stock'], function(){
    Route::get('/stock-in', 'Cms\StockController@stockIn')->name('stock.stock-in');
    Route::post('/stock-in', 'Cms\StockController@saveStockIn')->name('stock.stock-in');
    Route::get('/transfer-stock', 'Cms\StockController@transferStock')->name('stock.transfer-stock');
    Route::post('/transfer-stock', 'Cms\StockController@saveTransferStock')->name('stock.transfer-stock');
    Route::get('/wasted', 'Cms\StockController@wasted')->name('stock.wasted');
    Route::post('/wasted', 'Cms\StockController@saveWasted')->name('stock.wasted');
    
    Route::get('/find-stock-in-product', 'Cms\StockController@findStockInProduct')->name('stock.find-stock-in-product');
    Route::get('/find-stock-in-product-by-id', 'Cms\StockController@findStockInProductById')->name('stock.find-stock-in-product-by-id');


});

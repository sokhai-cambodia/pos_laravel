<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'CLEAR-CACHE DONE'; //Return anything
});

Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Front end View
require_once __DIR__.'/front-end.php';

// AJAX
require_once __DIR__.'/cms/ajax.php';

Route::group(['prefix' => 'cms', 'middleware' => ['auth']], function(){

    Route::get('', function () {
        return view('cms.index');
    })->name('cms');

    Route::get('/blank', function () {
        return view('cms.blank');
    })->name('blank');

    // USER
    require_once __DIR__.'/cms/user.php';

    // PROFILE
    require_once __DIR__.'/cms/profile.php';

    // BRANCH
    require_once __DIR__.'/cms/branch.php';

    // CATEGORY
    require_once __DIR__.'/cms/category.php';

    // UNIT
    require_once __DIR__.'/cms/unit.php';

    // ROLE
    require_once __DIR__.'/cms/role.php';

    // PRODUCT
    require_once __DIR__.'/cms/product.php';

    // ROOM
    require_once __DIR__.'/cms/room.php';

    // PERMISSION
    require_once __DIR__.'/cms/permission.php';

    // REPORTS
    require_once __DIR__.'/cms/report.php';

    // STOCK
    require_once __DIR__.'/cms/stock.php';

    // PAYMENT
    require_once __DIR__.'/cms/payment.php';
});

Route::group(['prefix' => 'front-end', 'middleware' => ['auth']], function () {
    Route::get('', function () {
        return view('front-end.index');
    })->name('front-end');
});
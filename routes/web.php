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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/cms', function () {
    return view('cms.index');
})->name('cms');


Route::get('/blank', function () {
    return view('cms.blank');
})->name('blank');

Route::get('/login', function () {
    return view('cms.login');
})->name('login');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// CATEGORY
require_once __DIR__.'/cms/category.php';


// PRODUCT
require_once __DIR__.'/cms/product.php';


// USER
require_once __DIR__.'/cms/user.php';


// UNIT
require_once __DIR__.'/cms/unit.php';

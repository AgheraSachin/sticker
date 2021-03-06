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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => [ 'auth','web']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    /*category*/
    Route::resource('category', 'categoryController');
    Route::get('add-category', 'categoryController@create');
    Route::post('add-category', 'categoryController@store');
    Route::get('edit-category/{id}', 'categoryController@edit')->name('edit-category');

    /*Tray icon*/
    Route::resource('tray_icon', 'TrayIconController');
    Route::get('add-tray-icon', 'TrayIconController@create');
    Route::post('add-tray-icon', 'TrayIconController@store');
    Route::get('edit-tray-icon/{id}', 'TrayIconController@edit')->name('edit-tray-icon');

    /*Sticker*/
    Route::resource('sticker', 'StickerController');
    Route::get('add-sticker', 'StickerController@create');
    Route::post('add-sticker', 'StickerController@store');
    Route::get('edit-sticker/{id}', 'StickerController@edit')->name('edit-sticker');

    /*Trendings*/
    Route::resource('trending', 'TrendingController');
    Route::get('add-trending', 'TrendingController@create');
    Route::post('add-trending', 'TrendingController@store');
    Route::get('edit-trending/{id}', 'TrendingController@edit')->name('edit-trending');

    /*version*/
    Route::resource('version', 'VersionController');
    Route::get('add-version', 'VersionController@create');
    Route::post('add-version', 'VersionController@store');
    Route::get('edit-version/{id}', 'VersionController@edit')->name('edit-version');



});

Route::get('/logout', 'Auth\LoginController@logout');




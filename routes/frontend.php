<?php

/**
 *
 * Frontend Routes Group
 */
Route::group(['namespace' => 'Frontend'], function (){

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/indexPaginate', 'HomeController@indexPaginate')->name('indexPaginate');
    Route::post('/filter','HomeController@filter')->name('filter');

});

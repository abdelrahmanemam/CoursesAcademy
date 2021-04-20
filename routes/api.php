<?php

Route::group(['namespace' => 'Mobile'], function () {

    Route::post('register', 'HomeController@register')->name('register');
    Route::post('login', 'HomeController@loginCheck')->name('login');

    Route::group(['middleware' => 'mobile'], function(){

        Route::get('index', 'HomeController@index')->name('index');

    });
});
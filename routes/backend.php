<?php
/**
 *
 * backend Routes Group
 */
Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function (){

    /**
     *
     * Login Routes
     */
    Route::get('/login', 'HomeController@login')->name('backend.login');
    Route::post('/login', 'HomeController@checkLogin')->name('backend.check.login');

    /**
     *
     * Routes Group With Middleware
     */
    Route::group(['middleware' => 'backend', 'as' => 'backend.'], function (){

        Route::get('/', 'HomeController@index')->name('index');



        // Backend Logout Route
        Route::get('/logout', 'HomeController@logout')->name('logout');

        Route::get('home/signup', 'HomeController@signup')->name('home.signup');
        Route::post('home/register', 'HomeController@register')->name('home.register');
        Route::get('home/admins', 'HomeController@admins')->name('home.admins');

        Route::post('/courses/delete/{id}', 'CourseController@destroy')->name('courses.delete');
        Route::post('/courses/active/{id}', 'CourseController@active')->name('courses.active');
        Route::post('/courses/deactive/{id}', 'CourseController@deactive')->name('courses.deactive');

        Route::post('/categories/delete/{id}', 'CategoryController@destroy')->name('categories.delete');
        Route::post('/categories/active/{id}', 'CategoryController@active')->name('categories.active');
        Route::post('/categories/deactive/{id}', 'CategoryController@deactive')->name('categories.deactive');

        Route::resources([

            'categories' => 'CategoryController',
            'courses' => 'CourseController',
        ]);




    });
});

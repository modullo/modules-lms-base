<?php

use Illuminate\Support\Facades\Route;
use Modullo\ModulesLmsBase\Http\Controllers\ModulesLmsBaseController;

Route::group(['namespace' => 'Modullo\ModulesLmsBase\Http\Controllers','middleware' => 'web'],function() {
    Route::get('/home','ModulesLmsBaseController@index')->name('home-index');
    Route::get('/search-courses','ModulesLmsBaseController@searchCourses')->name('search-courses');
    Route::get('/code-editor','ModulesLmsBaseController@practice')->name('code-practice');
    Route::group(['prefix' => 'courses'], function() {
        Route::get('{id}', 'ModulesLmsBaseController@viewCourse');
    });
});
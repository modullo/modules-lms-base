<?php

use Illuminate\Support\Facades\Route;
use Modullo\ModulesLmsBase\Http\Controllers\ModulesLmsBaseController;

Route::group(['namespace' => 'Modullo\ModulesLmsBase\Http\Controllers','middleware' => 'web'],function() {
    Route::get('/','ModulesLmsBaseController@index')->name('home');
    Route::get('/home','ModulesLmsBaseController@index')->name('home-index');
    Route::get('/search-courses','ModulesLmsBaseController@searchCourses')->name('search-courses');
});

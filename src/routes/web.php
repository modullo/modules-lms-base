<?php

use Illuminate\Support\Facades\Route;
use Lms\ModulesLmsBase\Http\Controllers\ModulesLmsBaseController;

Route::group(['namespace' => 'Lms\ModulesLmsBase\Http\Controllers','middleware' => 'web'],function() {

    Route::get('/dashboard','ModulesLmsBaseController@index');
    Route::get('/settings','ModulesLmsBaseController@settings');
    Route::get('/learner-management','ModulesLmsBaseController@management');

});

<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => config('dashboardRoute.namespace.backend'),
    'middleware'=>['web','auth','role:admin|editor|author']
],function(){
    Route::group([
        'prefix'=> config('dashboardRoute.prefix.backend'),
        'as' => 'backend.'
    ],function(){
        Route::get('/dashboard','DashboardController@index')->name('dashboard');
        Route::get('/user-password-change/{id}','DashboardController@passwordView')->name('userPasswordChange');
        Route::post ('/check-password','DashboardController@checkPassword')->name('passwordCheck');
        Route::post('/user-password-change-submit','DashboardController@userPasswordSubmit')->name('userPasswordSubmit');
    });
});










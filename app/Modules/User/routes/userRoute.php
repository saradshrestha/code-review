<?php
use Illuminate\Support\Facades\Route;

Route::group([
        'namespace' => config('userRoute.namespace.backend'),
        'middleware'=>['web','auth','role:admin']
    ],function(){
        Route::group([
            'prefix'=> config('userRoute.prefix.backend'),
            'as' => 'backend.users.'
        ],function(){
            Route::get('/','UserController@index')->name('index');
            Route::get('/get-users','UserController@getUsers')->name('getUsers');
            Route::get('/create','UserController@create')->name('create');
            Route::post('/submit','UserController@store')->name('store');
            Route::get('/edit/{id}','UserController@edit')->name ('edit');
            Route::post('/update/{id}','UserController@update')->name('update');
            Route::get('/delete/{id}','UserController@destroy')->name('delete');
            Route::get('/trash-users','UserController@trashUser')->name('trash');
            Route::get('/get-trash-users','UserController@getTrashUsers')->name('getTrashUsers');
            Route::get('/undo-delete/{id}','UserController@undoDelete')->name('undoDelete');
            Route::post('/status-update/{id}','UserController@statusUpdate')->name('statusUpdate');
            Route::get('/change-password/{id}','UserController@changePassword')->name('changePassword');
            Route::post('/password-submit/{id}','UserController@passwordSubmit')->name('passwordSubmit');
            Route::get('/permanent-delete/{id}','UserController@permanentDelete')->name('permaDelete');
        });
    });











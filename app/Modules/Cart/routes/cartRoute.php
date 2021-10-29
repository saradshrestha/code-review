<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => config('cartRoute.namespace.backend'),
    'middleware'=>['web']
    ],function (){

        Route::group([
            'prefix'=> config('cartRoute.prefix.backend'),
            'as' => 'backend.carts.'
            ],function(){
            Route::get('/','CartController@index')->name('index');
            Route::post('/add-to-cart','CartController@store')->name('store');
            Route::put('/update','CartController@update')->name('update');

            Route::get('/get-all-carts','CartController@getAllCart')->name('getAllCart');
            Route::get('/cart','CartController@getCart')->name('getCart');
            Route::delete('/delete','CartController@destroy')->name('delete');
           
        });
    });










<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => config('categoryRoute.namespace.backend') ,
    'middleware'=>['web','auth','role:admin|editor']
],function(){
    Route::group([
        'prefix'=> config('categoryRoute.prefix.backend'),
        'as' => 'backend.categories.'
    ],function(){
        Route::get('/','CategoryController@index')->name('index');
        Route::get('/get-categories','CategoryController@getCategories')->name('getCategories');
        Route::get('/create','CategoryController@create')->name('create');
        Route::post('/submit','CategoryController@store')->name('store');
        Route::get('/show/{id}','CategoryController@show')->name('show');
        Route::get('/edit/{id}','CategoryController@edit')->name('edit');
        Route::post('/update/{id}','CategoryController@update')->name('update');
        Route::get('/delete/{id}','CategoryController@destroy')->name('delete');
        Route::get('/trash-categories','CategoryController@trashCategory')->name('trash');
        Route::get('/get-trash-categories','CategoryController@getTrashCategories')->name('getTrashCategories');
        Route::get('/undo-delete/{id}','CategoryController@undoDelete')->name('undoDelete');
        Route::post('/status-update/{id}','CategoryController@statusUpdate')->name('statusUpdate');
        Route::get('/permanent-delete/{id}','CategoryController@permanentDelete')->name('permaDelete');
    });
});










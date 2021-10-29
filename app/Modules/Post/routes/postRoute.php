<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => config('postRoute.namespace.backend'),
    'middleware' => ['web','auth']
],function(){
    Route::group([
        'prefix' => config('postRoute.prefix.backend'),
        'as' => 'backend.posts.'
    ],function(){
        Route::get('/','PostController@index')->name('index');
        Route::get('/get-posts','PostController@getPosts')->name('getPosts');
        Route::get('/create','PostController@create')->name('create');
        Route::post('/submit','PostController@store')->name('store');
        Route::get('/edit/{id}','PostController@edit')->name('edit');
        Route::post('/update/{id}','PostController@update')->name('update');
        Route::get('/delete/{id}','PostController@destroy')->name('delete');
        Route::get('/undo-delete/{id}','PostController@undoDelete')->name('undoDelete');
        Route::get('/show/{id}','PostController@show')->name('show');
        Route::get('/trash-posts','PostController@trashPost')->name('trash');
        Route::get('/get-trash-posts','PostController@getTrashPosts')->name('getTrashPosts');
        Route::get('/permanent-delete-posts/{id}','PostController@permanentDelete')->name('permaDelete');
        Route::post('/post-status-update/{id}','PostController@statusUpdate')->name('statusUpdate');
        Route::post('/post-publish-update/{id}','PostController@publishUpdate')->name('publishUpdate');

        Route::post('/filter-by-date','PostController@filterByDate')->name('filterByDate');
    });
});











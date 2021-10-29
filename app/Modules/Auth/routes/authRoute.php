
<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => config('authRoute.namespace.backend') ,
    'middleware'=>'web'
],function(){
    Route::group([
        'prefix'=> config('authRoute.prefix.backend'),
        'as' => 'backend.'
    ],function(){
        Route::get('login','LoginController@showLoginForm')->name('showLogin');
        Route::post('login/submit','LoginController@login')->name('login');
        Route::get('logout','LoginController@logout')->name('logout')->middleware('auth');
    });
});


//Auth::routes();



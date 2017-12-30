<?php

/*
|--------------------------------------------------------------------------
| WebSite Routes
|--------------------------------------------------------------------------
*/


Route::get('/','FrontEnd\HomeController@showIndex')->name('index.home');


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    
    /*
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    */

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function(){

    Route::get('/', 'Admin\HomeController@index')->name('admin.home');

    /*
    |-----------------------
    | Category Routes
    |-----------------------
    */
    Route::resource('/category','Admin\CategoryController');


    /*
    |-----------------------
    | Password Routes
    |-----------------------
    */
    Route::get('/password' ,'Admin\HomeController@showPassword')->name('show.admin.password');
    Route::post('/password/update' ,'Admin\HomeController@changePassword')->name('update.admin.password');

    /*
    |-----------------------
    | Ads Routes
    |-----------------------
    */
    Route::get('/advertising' ,'Admin\AdsController@showAdminAds')->name('show.admin.ads');
    Route::post('/advertising/delete/{id}' ,'Admin\AdsController@deleteAdminAds')->name('delete.admin.ads');
    Route::get('/advertising/search' ,'Admin\AdsController@showAdminAdsSearch')->name('show.admin.ads.search');

    /*
    |-----------------------
    | Requests Routes
    |-----------------------
    */
    Route::get('/request' ,'Admin\RequestsController@showAdminRequests')->name('show.admin.request');
    Route::post('/request/delete/{id}' ,'Admin\RequestsController@deleteAdminRequests')->name('delete.admin.request');
    Route::get('/request/search' ,'Admin\RequestsController@showAdminRequestsSearch')->name('show.admin.request.search');

    /*
    |-----------------------
    | Settings Routes
    |-----------------------
    */
    Route::get('/setting' ,'Admin\SettingsController@showAdminSettings')->name('show.admin.setting');
    Route::post('/setting/update' ,'Admin\SettingsController@updateAdminSettings')->name('update.admin.setting');

});



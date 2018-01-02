<?php

/*
|--------------------------------------------------------------------------
| WebSite Routes
|--------------------------------------------------------------------------
*/


Route::get('/','FrontEnd\HomeController@showIndex')->name('index.home');


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

/*
|-----------------------
| Password Reset Routes
|-----------------------
*/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
|-----------------------
| Verification Routes
|-----------------------
*/
Route::get('/verification', 'Auth\VerificationController@showVerification')->name('show.verification');
Route::post('/verification', 'Auth\VerificationController@verification')->name('verification.user');

Route::post('/verification/resend', 'Auth\VerificationController@reSendVerificationToken')->name('verification.resend');


/*
|-----------------------
| Profile Routes
|-----------------------
*/

Route::get('/profile','Auth\ProfileController@showProfile')->name('profile.show');
Route::post('/profile/update','Auth\ProfileController@updateProfile')->name('profile.update');


/*
|-----------------------
| Advertising Routes
|-----------------------
*/

Route::resource('/ads','FrontEnd\AdsController');


/*
|-----------------------
| Favorite Routes
|-----------------------
*/

Route::resource('/favorite','FrontEnd\FavoriteController');


/*
|-----------------------
| Requests Routes
|-----------------------
*/
Route::get('/myrequest','FrontEnd\RequestsController@ShowMyRequests')->name('show.myrequests');
Route::resource('/request','FrontEnd\RequestsController');


/*
|-----------------------
| Categories Routes
|-----------------------
*/

Route::get('/categories','FrontEnd\CategoryController@showAllCategory')->name('show.categories');

Route::get('/categories/ads/{id}/{type}','FrontEnd\CategoryController@showAllCategoryAds')->name('show.categories.ads');

Route::get('/categories/result/ads' , 'FrontEnd\CategoryController@Search')->name('search.ads');

Route::post('/categories/ads/price','FrontEnd\CategoryController@showAllCategoryAdsPrice')->name('show.categories.ads.price');

/*
|-----------------------
| Contact Us Routes
|-----------------------
*/
Route::get('/contact','FrontEnd\HomeController@showContactForm')->name('show.contact');
Route::post('/contact/send','FrontEnd\HomeController@sendContactForm')->name('send.contact');
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
    | Reports Routes
    |-----------------------
    */

    Route::resource('/report','Admin\ReportsController');



    /*
    |-----------------------
    | Settings Routes
    |-----------------------
    */
    Route::get('/setting' ,'Admin\SettingsController@showAdminSettings')->name('show.admin.setting');
    Route::post('/setting/update' ,'Admin\SettingsController@updateAdminSettings')->name('update.admin.setting');

});



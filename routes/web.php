<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('', function () {
    return redirect('/welcome');
});
Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/welcome', function () {
    return view('landing-page.content');
});


Route::group(['prefix' => 'company'], function (){

    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout');
    Route::get('/home', 'Controller@index');

    Route::get('/documents/create', 'Controller@createDocument');
    Route::post('/documents/create', 'Controller@storeDocument');

});

Route::group(['prefix' => 'admin'], function () {

    // Route::get('/dashboard', 'AdminController@index');
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

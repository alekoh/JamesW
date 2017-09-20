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

Route::get('/login', function () {
    return redirect('/company/login');
});

Route::post('/register', 'Auth\RegisterController@create');

Route::group(['prefix' => 'company'], function (){

    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login');

    Route::get('/register', 'Auth\RegisterController@showForm');
    Route::post('/register', 'Auth\RegisterController@create');

    Route::get('/home', 'Controller@index')->name('home');

    Route::get('/documents/create', 'Controller@createDocument')->name('create');
    Route::post('/documents/create', 'Controller@storeDocument');
    Route::get('/documents/listMyDocuments', ['uses' => 'Controller@listMyDocuments', 'as'=>'listMyDocuments']);

    Route::get('/myRequests','Controller@listMyRequests')->name('myRequests');

    Route::get('/documentPreview',function (){
        return view('company/documentPreview');
    })->name('documentPreview');
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    /*add request*/
    Route::get('requests/createRequest','AdminController@create')->name('createRequest');

    Route::post('requests/createRequest','AdminController@store');

    Route::get('requests/editRequest/{id}','AdminController@edit');

    Route::post('requests/editRequest/{id}','AdminController@update');

    Route::get('requests/deleteRequest/{id}','AdminController@destroy')->name('deleteRequest');

    /*add company*/

    Route::get('companies/addCompany','AdminController@createCompany')->name('addCompany');
    Route::post('companies/addCompany','AdminController@storeCompany');

    Route::get('companies/listCompanies','AdminController@listCompanies')->name('listCompanies');
    Route::get('documents/listDocuments','AdminController@listDocuments')->name('listDocuments');
    Route::get('requests/listRequests','AdminController@listDemands')->name('listRequests');
    Route::get('documents/pending','AdminController@getPending')->name('pending');
    Route::get('documents/denied','AdminController@getDenied')->name('denied');

    Route::get('documents/documentPreviewAdmin',function (){
        return view('admin.documents.documentPreviewAdmin');
    })->name('documentPreviewAdmin');
});

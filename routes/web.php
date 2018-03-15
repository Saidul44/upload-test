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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/file-list', 'UploadFileController@fileList');

    Route::get('/upload-file/{upload_file}/destroy', 'UploadFileController@delete');

    Route::resource('/upload-file', 'UploadFileController');

    Route::get('users/{user}/destroy', 'UserController@delete');

    Route::resource('users', 'UserController');
});

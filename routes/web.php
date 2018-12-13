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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');

    // Group question 
    Route::get('/group', 'GroupsController@index');
    Route::post('/group', 'GroupsController@store');
    Route::post('/group/get-list', 'GroupsController@getList');
    Route::post('/group/delete', 'GroupsController@delete');
    Route::get('/', 'AdminController@index');
    Route::post('/group/edit', 'GroupsController@edit');

    //Question
    Route::get('/question', 'QuestionsController@index');
    Route::post('/question/delete', 'QuestionsController@delete');
    Route::get('/question/add', 'QuestionsController@add');
    Route::post('/question/add', 'QuestionsController@store');
    Route::get('/question/edit/{id}', 'QuestionsController@show');
    Route::post('/question/edit-question', 'QuestionsController@edit');
    Route::post('/question/get-list', 'QuestionsController@getList');

    //Topics
    Route::get('/topic', 'TopicsController@index');
    Route::post('/topic', 'TopicsController@store');
    Route::post('/topic/edit', 'TopicsController@edit');
    Route::post('/topic/delete', 'TopicsController@delete');
    Route::post('/topic/get-list/', 'TopicsController@getList');

    //Test exam
    Route::get('/test', 'TestsController@index');
    Route::post('/test/delete', 'TestsController@delete');
    Route::post('/test/get-list', 'TestsController@getList');
    Route::get('/test/add', 'TestsController@add');
    Route::post('/test/add', 'TestsController@store');
    Route::get('/list-test-disable', 'TestsController@listDisable');
    Route::post('/test/enable', 'TestsController@enable');
    Route::get('/test/disable/{id}/{status}', 'TestsController@disable');
}); 
Route::get('/admin-logout', '\App\Http\Controllers\Auth\AdminLoginController@logout');
Route::get('/home/un-test', 'HomeCOntroller@unTest');

Route::get('/topic/{class}', 'UsersController@topic');

Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
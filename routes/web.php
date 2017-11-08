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

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function(){
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users', 'UserController');
  Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
});

Route::prefix('courses')->middleware('role:superadministrator|administrator|teacher')->group(function(){
  Route::get('/', 'CoursesController@base');
  Route::get('/dashboard', 'CoursesController@dashboard')->name('courses.dashboard');
  Route::resource('/manage', 'CoursesController');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('profile')->middleware('auth')->group(function(){
  Route::get('/', 'ProfileController@profile')->name('profile');
  Route::post('/', 'ProfileController@update_avatar')->name('update_avatar');
  Route::post('email', 'ProfileController@update_email')->name('update_email');
  Route::get('delete-avatar/{id}', 'ProfileController@delete_avatar')->name('delete_avatar');
});

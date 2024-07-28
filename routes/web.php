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

Route::get('clear_cache', function () {
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    dd("Cache is cleared");
});


Route::get('/pagination', function () {
    return view('pagination');
});

Route::get('/email/laraemail', function () {
    return view('email.laraemail');
});

Route::get('/admin/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/profile', 'UserController@index')->name('my_profile');
Route::patch('/update_profile', 'UserController@update')->name('update_profile');
Route::patch('/user_password', 'UserController@password')->name('user_password');
Route::get('/admin/admin', 'AdminController@index')->name('admin');
Route::post('admin/admin', 'AdminController@create')->name('new_admin');
Route::patch('/admin/update/{id}', 'AdminController@update')->name('update_admin');
Route::get('/admin/delete/{id}','AdminController@destroy')->name('delete');
Route::get('admin/profile', 'UserController@index')->name('profile');
Route::patch('admin/change_profile', 'UserController@update')->name('change_profile');
Route::post('admin/password', 'UserController@password')->name('password');
Route::get('admin/customers', 'CustomersController@index')->name('customers');
Route::post('admin/new_customer', 'CustomersController@create')->name('new_customer');
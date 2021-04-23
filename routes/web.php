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



Route::get('user', 'User\UserController@index')->name('user');
Route::get('get_users', 'User\UserController@get_users')->name('get_users');
Route::get('add_user', 'User\UserController@add_user')->name('add_user');
Route::post('add_user', 'User\UserController@insert_user')->name('add_user');


Route::get('get_events', 'User\UserController@get_events')->name('get_events');
Route::get('add_event', 'User\UserController@add_event')->name('add_event');
Route::post('add_event', 'User\UserController@insert_event')->name('add_event');

Route::get('get_employees', 'User\UserController@get_employees')->name('get_employees');
Route::get('add_employee', 'User\UserController@add_employee')->name('add_employee');
Route::post('add_employee', 'User\UserController@insert_employee')->name('add_employee');

Route::prefix('employee')
    ->as('employee.')
    ->group(function() {
        Route::get('home', 'Home\EmployeeController@index')->name('home');
        Route::get('open_cars', 'Home\EmployeeController@get_open_cars')->name('open_cars');
        Route::post('import_cars', 'Home\EmployeeController@import_cars')->name('import_cars');

        Route::get('get_bidders', 'Home\EmployeeController@get_bidders')->name('get_bidders');

        Route::get('get_bids', 'Home\EmployeeController@get_bids')->name('get_bids');
        Route::get('add_bid', 'Home\EmployeeController@add_bid')->name('add_bid');
        Route::post('add_bid', 'Home\EmployeeController@insert_bid')->name('add_bid');

    	Route::namespace('Auth\Login')
    		->group(function() {
    			Route::get('login', 'EmployeeController@showLoginForm')->name('login');
				Route::post('login', 'EmployeeController@login')->name('login');
				Route::post('logout', 'EmployeeController@logout')->name('logout');
    		});
	});
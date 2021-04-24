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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('user', 'User\UserController@index')->name('user');

Route::get('get_users', 'User\UserController@get_users')->name('get_users');
Route::get('add_user', 'User\UserController@add_user')->name('add_user');
Route::post('add_user', 'User\UserController@insert_user')->name('add_user');
Route::get('edit_user/{id}', 'User\UserController@edit_user')->name('edit_user');
Route::post('update_user', 'User\UserController@update_user')->name('update_user');
Route::get('delete_user/{id}', 'User\UserController@delete_user')->name('delete_user');


Route::get('get_events', 'User\UserController@get_events')->name('get_events');
Route::get('add_event', 'User\UserController@add_event')->name('add_event');
Route::post('add_event', 'User\UserController@insert_event')->name('add_event');
Route::get('edit_event/{id}', 'User\UserController@edit_event')->name('edit_event');
Route::post('update_event', 'User\UserController@update_event')->name('update_event');
Route::get('delete_event/{id}', 'User\UserController@delete_event')->name('delete_event');

Route::get('get_employees', 'User\UserController@get_employees')->name('get_employees');
Route::get('add_employee', 'User\UserController@add_employee')->name('add_employee');
Route::post('add_employee', 'User\UserController@insert_employee')->name('add_employee');
Route::get('edit_employee/{id}', 'User\UserController@edit_employee')->name('edit_employee');
Route::post('update_employee', 'User\UserController@update_employee')->name('update_employee');
Route::get('delete_employee/{id}', 'User\UserController@delete_employee')->name('delete_employee');

Route::prefix('employee')
    ->as('employee.')
    ->group(function() {
        Route::get('home', 'Home\EmployeeController@index')->name('home');
        Route::get('open_cars', 'Home\EmployeeController@get_open_cars')->name('open_cars');
        Route::post('import_cars', 'Home\EmployeeController@import_cars')->name('import_cars');
        Route::get('publish_cars_present', 'Home\EmployeeController@publish_cars_present')->name('publish_cars_present');
        Route::post('set_bidding_end_time', 'Home\EmployeeController@set_bidding_end_time')->name('set_bidding_end_time');
        Route::post('set_estimated_draw_time', 'Home\EmployeeController@set_estimated_draw_time')->name('set_estimated_draw_time');


        Route::get('get_bidders', 'Home\EmployeeController@get_bidders')->name('get_bidders');
        Route::get('add_bidder', 'Home\EmployeeController@add_bidder')->name('add_bidder');
        Route::post('add_bidder', 'Home\EmployeeController@insert_bidder')->name('add_bidder');
        Route::get('edit_bidder/{id}', 'Home\EmployeeController@edit_bidder')->name('edit_bidder');
        Route::post('update_bidder', 'Home\EmployeeController@update_bidder')->name('update_bidder');
        Route::get('delete_bidder/{id}', 'Home\EmployeeController@delete_bidder')->name('delete_bidder');
        Route::get('export_bidder', 'Home\EmployeeController@export_bidder')->name('export_bidder');

        Route::get('get_bids', 'Home\EmployeeController@get_bids')->name('get_bids');
        Route::get('add_bid', 'Home\EmployeeController@add_bid')->name('add_bid');
        Route::post('add_bid', 'Home\EmployeeController@insert_bid')->name('add_bid');
        Route::get('export_bid', 'Home\EmployeeController@export_bid')->name('export_bid');

    	Route::namespace('Auth\Login')
    		->group(function() {
    			Route::get('login', 'EmployeeController@showLoginForm')->name('login');
				Route::post('login', 'EmployeeController@login')->name('login');
				Route::post('logout', 'EmployeeController@logout')->name('logout');
    		});
	});

/**
 * Define routes restful APIs for the mobile app of bidders
 * We will implement access_token and other passports including sms code
 */

Route::get('getAvailableCarsForBid', [App\Http\Controllers\Api\BidderController::class, 'getAvailableCarsForBid']);

Route::post('sendNewBids', [App\Http\Controllers\Api\BidderController::class, 'sendNewBids']);

Route::post('regBidder', [App\Http\Controllers\Api\BidderController::class, 'regBidder']);
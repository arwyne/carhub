<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

// auth user and admin
Route::get('/cars', 'CarController@carList')->middleware('admin');

// admin
Route::get('/cars/add', 'CarController@carAdd');
Route::post('/cars/add/save', 'CarController@carSave');
Route::get('/cars/{id}', 'CarController@carInfo');
Route::get('/cars/{id}/edit', 'CarController@carEdit');
Route::patch('/cars/{id}', 'CarController@carUpdate');
Route::get('/cars/{id}/delete', 'CarController@carDelete');

// auth user only
Route::get('/reservation/{id}', 'ReservationController@reservationAdd');
Route::post('/reservation/{id}/save', 'ReservationController@reservationSave');
Route::get('/reservation', 'ReservationController@reservationInfo');
Route::get('/reservationconfirm', 'ReservationController@reservationConfirm');
Route::get('/reservationclear', 'ReservationController@reservationClear');

// auth user only
Route::get('/profile/reservation', 'ProfileController@profileStatus');
Route::get('/profile/reservation/{id}/cancel', 'ReservationController@reservationCancel');
Route::get('/profile/transactions', 'ProfileController@profileList');

//admin only
Route::get('/transactions', 'TransactionController@transactionList');
Route::get('/transactions/{id}/delete', 'TransactionController@transactionDelete');
Route::get('/transactions/{id}/deploy', 'TransactionController@transactionDeploy');
Route::get('/transactions/{id}/return', 'TransactionController@transactionReturn');
Route::get('/transactions/{id}', 'TransactionController@transactionInfo');
Route::get('/transactions/{id}/edit', 'TransactionController@transactionEdit');
Route::patch('/transactions/{id}', 'TransactionController@transactionUpdate');


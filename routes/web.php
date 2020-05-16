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

// Route::resource('cars', 'CarController');
// Route::resource('reservation', 'ReservationController');

Route::get('/cars', 'CarController@carList');
Route::get('/cars/add', 'CarController@carAdd');
Route::post('/cars/add/save', 'CarController@carSave');
Route::get('/cars/{id}', 'CarController@carInfo');
Route::get('/cars/{id}/edit', 'CarController@carEdit');
Route::patch('/cars/{id}', 'CarController@carUpdate');
Route::get('/cars/{id}/delete', 'CarController@carDelete');

Route::get('/reservation/{id}', 'ReservationController@reservationAdd');
Route::post('/reservation/{id}/save', 'ReservationController@reservationSave');
Route::get('/reservation', 'ReservationController@reservationInfo');
Route::get('/reservationconfirm', 'ReservationController@reservationConfirm');
Route::get('/reservationclear', 'ReservationController@reservationClear');

Route::get('/profile/reservation', 'ProfileController@profileInfo');
Route::get('/profile/reservation/{id}/cancel', 'ReservationController@reservationCancel');
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('activate','Auth\ActivationController@activate')->name('activate_account');
Route::get('activate/resend','Auth\ActivationResendController@showResendForm')->name('show_resend_activation_form');
Route::post('activate/resend','Auth\ActivationResendController@resend')->name('resend_activation_email');


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

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/motor/add', 'MotorController@add');
    Route::post('/motor/store', 'MotorController@store')->name('admin.store');
    Route::get('/list', 'MotorController@list');
    Route::get('/motor/{id}/edit', 'MotorController@edit');
    Route::post('/motor/{id}/update', 'MotorController@update')->name('admin.update');
    Route::delete('/motor/{id}/delete', 'MotorController@destroy')->name('admin.delete');
});

Route::get('/list', 'MotorController@list');
Route::get('/motor/{id}/detail', 'MotorController@detail');

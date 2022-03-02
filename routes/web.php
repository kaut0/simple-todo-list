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

Route::get('/', 'TodoController@index');
Route::post('/todo', 'TodoController@store')->name('post_todo');
Route::put('/todo/update/{id}', 'TodoController@update')->name('update_todo');
Route::delete('/todo/delete/{id}', 'TodoController@delete')->name('delete_todo');
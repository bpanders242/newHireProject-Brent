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

#Routes for each page
Route::get('/', 'PagesController@index');

Route::get('/search', 'PagesController@search');

Route::get('/results', 'PagesController@results');

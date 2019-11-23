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

// Routes for Client CRUD
Route::resource('client','ClientController');
// Route for search page
Route::get('search',function(){
  return view('client.search');
});
// Route for AJAX search
Route::post('search','ClientController@search');

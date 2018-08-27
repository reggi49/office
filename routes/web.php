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

// Route::get('/', function () {
//     return view('welcome');
// });
// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->post('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/data', 'HomeController@datambtech')->name('data');
Route::resource('/data', 'DataController',['as' => 'data']);
Route::resource('/users', 'UsersController',['as' => 'users']);

// Route::get('/users', 'UsersController@index')->name('users');

// Get Data Datatables
Route::get('datatable/getdata', 'HomeController@getPosts')->name('datatable/getdata');

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
Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('redirect');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/data', 'HomeController@datambtech')->name('data');
Route::resource('/data', 'DataController',['as' => 'data']);
Route::resource('/users', 'UsersController',['as' => 'users']);
Route::get('/detailpdf/{id}','DataController@detailpdf');
Route::get('/allpdf','DataController@allpdf');


// users route
// Route::group(['prefix' => 'mbtech-office'], function () {
//     Route::get('/', 'UsersController@index');
//     Route::match(['get', 'post'], 'create', 'UsersController@create');
//     Route::match(['get', 'put'], 'update/{id}', 'UsersController@update');
//     Route::delete('delete/{id}', 'UsersController@delete');
// });
// Get Data Datatables
Route::get('datatable/getdata', 'HomeController@getPosts')->name('datatable/getdata');
